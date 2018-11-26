<?php

namespace backend\controllers;

use backend\models\GroupTech;
use backend\models\HSubStudent;
use backend\models\Members;
use backend\models\Students;
use Yii;
use backend\models\Group;
use backend\models\GroupSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SubStudents;
use backend\models\Model;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delete-sub' => ['POST']
                ],
            ],
        ];
    }

    /**
     * Lists all Group models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Group model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Group();
//        $first = new GroupTech();
//        $second = [new GroupTech];
//
//        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//            return \yii\widgets\ActiveForm::validate($model);
//        }
//        if ($model->load(Yii::$app->request->post()) && $model->save() && $first->load(Yii::$app->request->post())) {
//            $second = Model::createMultiple(GroupTech::classname());
//            Model::loadMultiple($second, Yii::$app->request->post());
//
//            foreach ($second as $s) {
//                $s->group_id = $model->id;
//                $s->status = 1;
//                $s->save();
//            }
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//            'first' => $first,
//            'second' => (empty($second)) ? [new GroupTech] : $second
//        ]);
//    }


    public function actionCreate()
    {
        $model = new Group();
        $array = Students::find()->where('id not in (select students_id from sub_students) and (select id from contract where contract.students_id=students.id) and active=1')->all();
        $students = ArrayHelper::map($array, 'id', function ($model) {
            return $model->contract->contract . ' | Name:' . $model->name . ' | ID:' . $model->id;
        });
        $sub_student = new SubStudents();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        //
        if ($model->load(Yii::$app->request->post()) && $model->save() && $sub_student->load(Yii::$app->request->post())) {
            //echo '<pre>'.print_r($sub_student,true).'</pre>';
            foreach ($sub_student->students_id as $i => $sub) {
                //echo $i . ' '.$sub."<br/>";
                $save = new SubStudents();
                $save->students_id = $sub;
                $save->begin_date = date('Y-m-d');
                $save->group_id = $model->id;
                $save->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'students' => $students,
            'sub_student' => $sub_student
        ]);
    }

    /**
     * Updates an existing Group model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }

    //change student group

    public function actionChange($id, $group)
    {
        $model = SubStudents::findOne(['students_id' => $id, 'group_id' => $group]);
        $new = new SubStudents();
        $hSub = new HSubStudent();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($new->load(Yii::$app->request->post()) && $hSub->load(Yii::$app->request->post())) {
            $hSub->group_id = $model->group_id;
            $hSub->student_id = $model->students_id;
            $hSub->date = date('Y-m-d H:i:s');
            $hSub->begin_date = $model->begin_date;
            $hSub->to_group_id = $new->group_id;
            if ($hSub->save()) {
                if ($model->delete()) {
                    $new->begin_date = date('Y-m-d');
                    $new->students_id = $id;
                    if ($new->save()) {
                        return $this->redirect(Yii::$app->request->referrer);
                    } else {
                        return print_r($new->errors);
                    }
                } else {
                    return print_r($model->errors);
                }
            } else {
                return print_r($hSub->errors);
            }

        }
        return $this->renderAjax('change', [
            'model' => $model,
            'hSub' => $hSub,
            'new' => $new
        ]);
    }


    //delete group student
    public function actionDeleteSub($id, $group)
    {
        $model = SubStudents::findOne(['students_id' => $id, 'group_id' => $group]);
        $sub = new HSubStudent();
        $sub->student_id = $model->students_id;
        $sub->group_id = $model->group_id;
        $sub->date = date('Y-m-d H:i:s');
        $sub->begin_date = $model->begin_date;
        $sub->comment = 'delete';
        $sub->to_group_id = 0;
        if ($sub->save()) {
            if ($model->delete()) {
                return $this->redirect(Yii::$app->request->referrer);
            } else {
                return print_r($model->errors);
            }
        } else {
            return print_r($sub->errors);
        }
    }
}
