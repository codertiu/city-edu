<?php

namespace backend\controllers;

use backend\models\Group;
use backend\models\GroupTech;
use backend\models\Members;
use backend\models\SubStudents;
use Yii;
use backend\models\Mark;
use backend\models\MarkSearch;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\User;
use backend\models\Model;

/**
 * MarkController implements the CRUD actions for Mark model.
 */
class MarkController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'save' => ['POST']
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Lists all Mark models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MarkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mark model.
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
     * Creates a new Mark model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mark();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mark model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Mark model.
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
     * Finds the Mark model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mark the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mark::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPutMark($group_id, $teacher_id)
    {
        $groupTech = GroupTech::find()->where(['status' => 1, 'teacher_id' => $teacher_id, 'group_id' => $group_id]);
        if ($groupTech->exists()) {
            $group = Group::find()->where(['id' => $groupTech->one()->id, 'group_status_id' => 1])->one();
            $students = SubStudents::find()->where(['group_id' => $group->id])->andWhere(['is', 'end_date', null])->all();
            return $this->render('put-mark', [
                'groupTech' => $groupTech,
                'group' => $group,
                'students' => $students
            ]);
        }
        throw new NotFoundHttpException('Kirish huquqi sizda yo\'q');
    }

    //mark ka quyidagilarni saqlydi
    //$date -> date bugungi kuni
    //$teacher_id ->teacher_id members id
    //$mark_type ->mark_type 1 - oddiy o'qsih 2-imtihon
    public function actionSave()
    {
        if (isset($_POST['teacher_id'])) {
            $teacher_id = $_POST['teacher_id'];
        } else {
            $teacher_id = Members::find()->where(['user_id' => Yii::$app->user->identity->id])->one()->id;
        }

        if (isset($_POST['mark_type'])) {
            $mark_type = $_POST['mark_type'];
        } else {
            $mark_type = 1;
        }

        if (isset($_POST['group_id'])) {
            $group_id = $_POST['group_id'];
        }

        // absent keldi keti kemasa 1
        if (isset($_POST["absent"])) {
            $a = $_POST["absent"];
        } else {
            $a = null;
        }
        if (isset($_POST["Home_work"])) {
            $h = $_POST["Home_work"];
        } else {
            $h = null;
        }

        if (isset($_POST['Discipline'])) {
            $d = $_POST['Discipline'];
        } else {
            $d = null;
        }

        if (isset($_POST['Like'])) {
            $l = $_POST['Like'];
        } else {
            $l = null;
        }

        if (isset($_POST['Grammer'])) {
            $g = $_POST['Grammer'];
        } else {
            $g = null;
        }

        if (isset($_POST['Vocabulary'])) {
            $v = $_POST['Vocabulary'];
        } else {
            $v = null;
        }

        if (isset($_POST['Speaking'])) {
            $sep = $_POST['Speaking'];
        } else {
            $sep = null;
        }

        if (isset($_POST['Listening'])) {
            $lis = $_POST['Listening'];
        } else {
            $lis = null;
        }

        if (isset($_POST['Reading'])) {
            $r = $_POST['Reading'];
        } else {
            $r = null;
        }

        if (isset($_POST['Writing'])) {
            $w = $_POST['Writing'];
        } else {
            $w = null;
        }

        if (isset($_POST['Dislike'])) {
            $dis = $_POST['Dislike'];
        } else {
            $dis = null;
        }

        if (isset($_POST['comment'])) {
            $comment = $_POST['comment'];
        } else {
            $comment = null;
        }

        if (isset($_POST['students'])) {
            $s = $_POST['students'];

            foreach ($s as $k => $i) {
                //agar absent 1 bo'lsa faqat bitta zabis qo'shadi
                if ($a[$k] == 1) {
                    $save = new Mark();
                    $save->date = date('Y-m-d H:i:s');;
                    $save->mark_status = 0;
                    $save->mark = 0;
                    $save->member_id = $teacher_id;
                    $save->students_id = $i;
                    $save->comment = $comment[$k];
                    $save->absent = 1;
                    $save->mark_type = $mark_type;
                    $save->group_id = $group_id;
                    $save->save(false);
                    continue;
                } else {
                    //homework
                    if ($h[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 1;
                        $save->mark = $h[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Discipline
                    if ($d[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 2;
                        $save->mark = $d[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Like
                    if ($l[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 3;
                        $save->mark = $l[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Grammer
                    if ($g[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 4;
                        $save->mark = $g[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Vocabulary
                    if ($v[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 5;
                        $save->mark = $v[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Speaking
                    if ($sep[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 6;
                        $save->mark = $sep[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Listening
                    if ($lis[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 7;
                        $save->mark = $lis[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Reading
                    if ($r[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 8;
                        $save->mark = $r[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Writing
                    if ($w[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 9;
                        $save->mark = $w[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                    //Dislike
                    if ($dis[$k]) {
                        $save = new Mark();
                        $save->date = date('Y-m-d H:i:s');
                        $save->mark_status = 10;
                        $save->mark = $dis[$k];
                        $save->member_id = $teacher_id;
                        $save->students_id = $i;
                        $save->comment = $comment[$k];
                        $save->absent = 0;
                        $save->mark_type = $mark_type;
                        $save->group_id = $group_id;
                        $save->save(false);
                    }
                }
            }
            \Yii::$app->session->setFlash('success', 'Success');
        }
        //return $this->redirect(['index']);
    }
}
