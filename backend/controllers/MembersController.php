<?php

namespace backend\controllers;

use Yii;
use backend\models\Members;
use backend\models\MembersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MembersController implements the CRUD actions for Members model.
 */
class MembersController extends Controller
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
     * Lists all Members models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Members model.
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
     * Creates a new Members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Members();

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
                $model->img = $imageName.'.'.$model->fileimg->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

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
                $model->img = $imageName.'.'.$model->fileimg->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Members model.
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
     * Finds the Members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Members::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }
}
