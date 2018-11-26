<?php

namespace backend\controllers;

use backend\models\HGroupTech;
use Yii;
use backend\models\GroupTech;
use backend\models\GroupTechSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupTechController implements the CRUD actions for GroupTech model.
 */
class GroupTechController extends Controller
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
                ],
            ],
        ];
    }

    /**
     * Lists all GroupTech models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupTechSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GroupTech model.
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
     * Creates a new GroupTech model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GroupTech();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GroupTech model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GroupTech model.
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
     * Finds the GroupTech model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupTech the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GroupTech::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }

    public function actionInsert()
    {
        $group = Yii::$app->request->post('GroupTech')['group_id'];
        $teacher = Yii::$app->request->post('GroupTech')['teacher_id'];
        $type_of_study = Yii::$app->request->post('GroupTech')['type_of_studay'];

        $model = new GroupTech();
        $model->group_id = $group;
        $model->teacher_id = $teacher;
        $model->type_of_studay = $type_of_study;
        $model->status = 1;
        if ($model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return print_r($model->errors);
        }

    }

    public function actionDeleteSub($teach, $group)
    {
        $model = GroupTech::findOne(['teacher_id' => $teach, 'group_id' => $group]);
        if ($model) {
            $history = new HGroupTech();
            $history->group_id = $model->group_id;
            $history->teacher_id = $model->teacher_id;
            $history->type_of_study = $model->type_of_studay;
            $history->begin_date = $model->create_date;
            $history->end_date = date('Y-m-d H:i:s');
            $history->comment = 'delete';
            if ($history->save()) {
                if ($model->delete()) {
                    return $this->redirect(Yii::$app->request->referrer);
                } else {
                    return print_r($model->errors);
                }
            } else {
                return print_r($history->errors);
            }
        } else {
            return print_r($model->errors);
        }
    }
}
