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
     * @throws NotFoundHttpException if the model cannot be found
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

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            //img
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image) {
                $filename = md5(time() . Yii::$app->user->id . $model->image->baseName . rand(1, 1000000) . rand(1, 1000000)) . '.' . $model->image->extension;

                $model->image->saveAs('uploads/img/' . $filename);
                $model->image = 'uploads/img/' . $filename;

            }
            //pass_file
            $model->pass_file = UploadedFile::getInstance($model, 'pass_file');
            if($model->pass_file) {
                $filename = md5(time() . Yii::$app->user->id . $model->pass_file->baseName . rand(1, 1000000) . rand(1, 1000000)) . '.' . $model->pass_file->extension;
                $model->pass_file->saveAs('uploads/pass/' . $filename);
                $model->pass_file = 'uploads/pass/' .$filename;
            }
            //file
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file) {
                $filename = md5(time() . Yii::$app->user->id . $model->file->baseName . rand(1, 1000000) . rand(1, 1000000)) . '.' . $model->file->extension;
                $model->file->saveAs('uploads/file/' . $filename);
                $model->file = 'uploads/file/' . $filename;
            }

            $model->active = 1;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } /*else {
                return print_r($model->errors);
            }*/
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Students model.
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
     * Deletes an existing Students model.
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
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }
}
