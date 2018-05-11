<?php

namespace backend\controllers;

use backend\models\Comment;
use backend\models\Note;
use backend\models\ReceptionTech;
use backend\models\Students;
use backend\models\StudentsInfo;
use Yii;
use backend\models\Reception;
use backend\models\ReceptionSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use webvimark\modules\UserManagement\models\User;

/**
 * ReceptionController implements the CRUD actions for Reception model.
 */
class ReceptionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /*[
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 60,
                'variations' => [
                    \Yii::$app->language,
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(*) FROM reception',
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];/*
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];*/
    }

    /**
     * Lists all Reception models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (User::hasRole('Administration')) {
            $form = new Reception();
            $searchModel = new ReceptionSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $session = Yii::$app->session;
            $session->set('type_of_reg', 2);
            if (Yii::$app->request->isAjax && $form->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($form);
            }
            return $this->render('index', [
                'form' => $form,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new NotFoundHttpException(Yii::t('main','Murojaat huquqi mavjud emas'));
        }
    }

    /**
     * Displays a single Reception model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $note = new Note();
        $note_info = Note::find()->where(['reception_id' => $id])->orderBy(['create_date' => SORT_DESC])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'note' => $note,
            'note_info' => $note_info
        ]);
    }

    /**
     * Creates a new Reception model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reception();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->instance_id = 1;
            if ($model->save(false)) {
                if (Yii::$app->session->get('type_of_reg') == 1) {
                    Yii::$app->session->remove('type_of_reg');
                    return $this->redirect(['call-center']);
                } else {
                    Yii::$app->session->remove('type_of_reg');
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('create', [
                    'model' => $model
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reception model.
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
     * Deletes an existing Reception model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (User::hasRole('admin')) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        }else {
            throw new NotFoundHttpException(Yii::t('main','Murojaat huquqi mavjud emas'));
        }
    }

    /**
     * Finds the Reception model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reception the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reception::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }


    public function actionNote()
    {
        $note = new Note();
        if ($note->load(Yii::$app->request->post())) {
            $note->create_date = date('Y-m-d H:i:s');
            $note->creator = Yii::$app->user->identity->id;
            $note->save(false);
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionChange($changeId = null, $position = null)
    {
        $model = Reception::findOne($changeId);
        $model->instance_id = $position;
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer);
    }

    // comment yaratish

    public function actionComment($changeId = null)
    {
        $model = Reception::findOne($changeId);
        $comment = new Comment();
        //$tech = ReceptionTech::find()->where(['reception_id' => $model->id, 'member_id'])->one();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if (empty($model->comment_id)) {
                $comment->name = $model->commentId;
                $comment->save(false);
                $model->comment_id = $comment->id;
            }
            $model->instance_id = 5;
            $model->save(false);
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('comment', [
            'model' => $model,
        ]);
    }

    // Ro'yxatdan o'tish uchun
    public function actionRegister($id = null)
    {
        if (User::hasRole('Administration')) {
            $model = new Students();
            $reception = Reception::findOne($id);
            $students_info = new StudentsInfo();
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            }
            if ($model->load(Yii::$app->request->post()) && $students_info->load(Yii::$app->request->post())) {

                //img
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->image) {
                    $filename = md5(time() . Yii::$app->user->id . $model->image->baseName . rand(1, 1000000) . rand(1, 1000000)) . '.' . $model->image->extension;

                    $model->image->saveAs('uploads/img/' . $filename);
                    $model->image = 'uploads/img/' . $filename;

                }
                //pass_file
                $model->pass_file = UploadedFile::getInstance($model, 'pass_file');
                if ($model->pass_file) {
                    $filename = md5(time() . Yii::$app->user->id . $model->pass_file->baseName . rand(1, 1000000) . rand(1, 1000000)) . '.' . $model->pass_file->extension;
                    $model->pass_file->saveAs('uploads/pass/' . $filename);
                    $model->pass_file = 'uploads/pass/' . $filename;
                }
                //file
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file) {
                    $filename = md5(time() . Yii::$app->user->id . $model->file->baseName . rand(1, 1000000) . rand(1, 1000000)) . '.' . $model->file->extension;
                    $model->file->saveAs('uploads/file/' . $filename);
                    $model->file = 'uploads/file/' . $filename;
                }

                $model->active = 1;
                if ($model->save()) {
                    $reception->instance_id = 4;
                    $reception->save(false);
                    $students_info->students_id = $model->id;
                    $students_info->save();
                    \Yii::$app->session->setFlash('success', Yii::t('main', 'Student Reg'));
                    return $this->redirect(['index']);
                }
            }

            return $this->render('students', [
                'model' => $model,
                'reception' => $reception,
                'students_info' => $students_info,
            ]);
        } else {
            throw new NotFoundHttpException(Yii::t('main','Murojaat huquqi mavjud emas'));
        }
    }

    // class - center
    public function actionCallCenter()
    {
        if (User::hasRole('call-center')) {
            $form = new Reception();
            $searchModel = new ReceptionSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $session = Yii::$app->session;
            $session->set('type_of_reg', 1);
            if (Yii::$app->request->isAjax && $form->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($form);
            }
            return $this->render('call-center', [
                'form' => $form,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new NotFoundHttpException('#404.');
        }
    }

    // Cancel list

    public function actionCancel(){
        $model = Reception::find()->where(['in','instance_id',[5,6,7]]);
        $pagination = new Pagination([
           'defaultPageSize'=>20,
            'totalCount'=>$model->count()
        ]);
        $model = $model->orderBy(['update_date'=>SORT_DESC])
                        ->offset($pagination->offset)
                        ->limit($pagination->limit)
                        ->all();
        return $this->render('cancel',[
            'model'=>$model,
            'pagination'=>$pagination
        ]);
    }
}


