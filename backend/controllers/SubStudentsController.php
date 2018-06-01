<?php

namespace backend\controllers;

use Yii;
use backend\models\SubStudents;
use backend\models\SubStudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Model;
/**
 * SubStudentsController implements the CRUD actions for SubStudents model.
 */
class SubStudentsController extends Controller
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

                ],
            ],
        ];
    }

    /**
     * Lists all SubStudents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubStudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubStudents model.
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
     * Creates a new SubStudents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new SubStudents();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'id'=>$id
        ]);
    }

    /**
     * Updates an existing SubStudents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SubStudents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the SubStudents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubStudents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubStudents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }

    // massivni  student qo'shish
    public function actionAddStudents($group){
        $first = new SubStudents();
        $model = [new SubStudents];
        if ($first->load(Yii::$app->request->post())) {
            $model = Model::createMultiple(SubStudents::classname());
            Model::loadMultiple($model, Yii::$app->request->post());
            foreach ($model as $t) {
                $t->begin_date = $first->begin_date;
                $t->group_id = $first->group_id;
                $t->save();
            }
            return $this->redirect(['/group/view','id'=>$first->group_id]);

        }
        return $this->render('add-students',
            [
                'group'=>$group,
                'first' => $first,
                'model' => (empty($model)) ? [new SubStudents] : $model,
            ]);

    }

}
