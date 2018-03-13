<?php

namespace backend\controllers;

use Yii;
use backend\models\Students;
use backend\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Students();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->filecv = UploadedFile::getInstance($model,'filecv');
            $model->fileimg = UploadedFile::getInstance($model,'fileimg');
            if ($model->filecv) {
                $fileNameuz=Yii::$app->getSecurity()->generateRandomString().'.'.$model->filecv->extension;
                $upload_path = Yii::getAlias('@backend/web/uploads/').$fileNameuz;
                $model->filecv->saveAs( $upload_path.'.'.$model->filecv->extension );
                $model->file = $fileNameuz.'.'.$model->filecv->extension;
            }
            if ($model->fileimg) {
                $imageName=Yii::$app->getSecurity()->generateRandomString().'.'.$model->fileimg->extension;
                $upload_path = Yii::getAlias('@backend/web/uploads/').$imageName;
                $model->fileimg->saveAs( $upload_path.'.'.$model->fileimg->extension);
                $model->image = $imageName.'.'.$model->fileimg->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {

            $model->filecv = UploadedFile::getInstance($model,'filecv');
            $model->fileimg = UploadedFile::getInstance($model,'fileimg');
            if ($model->filecv) {
                $fileNameuz=Yii::$app->getSecurity()->generateRandomString().'.'.$model->filecv->extension;
                $upload_path = Yii::getAlias('@backend/web/uploads/').$fileNameuz;
                $model->filecv->saveAs( $upload_path.'.'.$model->filecv->extension );
                $model->file = $fileNameuz.'.'.$model->filecv->extension;
            }
            if ($model->fileimg) {
                $imageName=Yii::$app->getSecurity()->generateRandomString().'.'.$model->fileimg->extension;
                $upload_path = Yii::getAlias('@backend/web/uploads/').$imageName;
                $model->fileimg->saveAs( $upload_path.'.'.$model->fileimg->extension);
                $model->image = $imageName.'.'.$model->fileimg->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
