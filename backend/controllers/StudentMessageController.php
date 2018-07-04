<?php

namespace backend\controllers;

use backend\models\Students;
use Yii;
use backend\models\StudentMessage;
use backend\models\StudentMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use webvimark\modules\UserManagement\models\User;

/**
 * StudentMessageController implements the CRUD actions for StudentMessage model.
 */
class StudentMessageController extends Controller
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
     * Lists all StudentMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(User::hasRole('Admin')) {

            $searchModel = new StudentMessageSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        throw new NotFoundHttpException(Yii::t('main','Kirish huquqi sizda yo\'q'));

    }

    /**
     * Displays a single StudentMessage model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(User::hasRole('Admin')) {
            $s = $this->findModel($id);
            if($s->status==1) {
                $s->status = 2;
                $s->save(false);
            }
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        throw new NotFoundHttpException(Yii::t('main','Kirish huquqi sizda yo\'q'));
    }

    /**
     * Creates a new StudentMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(User::hasRole('Student')) {
            $model = new StudentMessage();

            if ($model->load(Yii::$app->request->post())) {
                $model->student_id = Students::find()->where(['user_id'=>Yii::$app->user->identity->id])->one()->id;
                $model->create_date = date('Y-m-d H:i:s');
                $model->status = 1;
                $model->save();
                \Yii::$app->session->setFlash('success','Success');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        throw new NotFoundHttpException(Yii::t('main','Kirish huquqi sizda yo\'q'));
    }

    /**
     * Updates an existing StudentMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(User::hasRole('Admin')) {

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                if($model->answer){
                    $model->status=3;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        throw new NotFoundHttpException(Yii::t('main','Kirish huquqi sizda yo\'q'));
    }

    /**
     * Deletes an existing StudentMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     *//*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentMessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }
}
