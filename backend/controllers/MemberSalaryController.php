<?php

namespace backend\controllers;

use backend\models\Members;
use Yii;
use backend\models\MemberSalary;
use backend\models\MemberSalarySearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberSalaryController implements the CRUD actions for MemberSalary model.
 */
class MemberSalaryController extends Controller
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
     * Lists all MemberSalary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberSalarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MemberSalary model.
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
     * Creates a new MemberSalary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MemberSalary();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MemberSalary model.
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
     * Deletes an existing MemberSalary model.
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
     * Finds the MemberSalary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MemberSalary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MemberSalary::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList($id = null)
    {
        $name = Members::findOne($id)->fio;
        $model = MemberSalary::find()->where(['member_id'=>$id]);
        $pagination = new Pagination([
           'defaultPageSize'=>25,
            'totalCount'=>$model->count()
        ]);
        $model = $model->orderBy('date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('list',['model'=>$model,'name'=>$name,'pagination'=>$pagination,'id'=>$id]);
    }
    public function actionCreate2($id  = null)
    {
        $model = new MemberSalary();
        //$member_id = MemberSalary::find()->where(['member_id'=>$id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->member_id = $id;
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('form', [
            'model' => $model
        ]);
    }
}
