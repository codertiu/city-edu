<?php

namespace backend\controllers;

use Yii;
use backend\models\Schedule;
use backend\models\ScheduleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Model;
/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class ScheduleController extends Controller
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
     * Lists all Schedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schedule model.
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
     * Creates a new Schedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $first = new Schedule();
        $model = [new Schedule];
        if ($first->load(Yii::$app->request->post())) {

            $model = Model::createMultiple(Schedule::classname());
            Model::loadMultiple($model, Yii::$app->request->post());

            foreach ($model as $m) {
                $m->day_id = $first->day_id;
                $m->active = $first->active;
                $m->group_id=$first->group_id;
                $m->save();
            }
            return $this->redirect(['index']);
            // ajax validation
//            if (Yii::$app->request->isAjax) {
//                Yii::$app->response->format = Response::FORMAT_JSON;
//                return \yii\helpers\ArrayHelper::merge(
//                    \yii\widgets\ActiveForm::validateMultiple($model),
//                    \yii\widgets\ActiveForm::validate($first)
//                );
//            }

           //  validate all models
            //$valid = $first->validate();
            //$valid = Model::validateMultiple($model) && $valid;

            //if ($valid) {
//                $transaction = \Yii::$app->db->beginTransaction();
//                try {
//                    //if ($flag = $first->save()) {
//                        foreach ($model as $m) {
//                            $m->day_id = $first->day_id;
//                            $m->active = $first->active;
//                            $m->group_id=$first->group_id;
//                            $m->save();
//                            //$modelAddress->save(false);
//                            //if (!($flag = $modelAddress->save())) {
//                              //  $transaction->rollBack();
//                                //break;
//                            //}
//                        }
//                    return $this->redirect(['index']);
//                    //}
//                    //if ($flag) {
//                      //  $transaction->commit();
//                        //return $this->redirect(['index']);
//                    //}
//                } catch (Exception $e) {
//                    $transaction->rollBack();
//                }
            //}
        }

        return $this->render('create', [
            'first' => $first,
            'model' => (empty($model)) ? [new Schedule] : $model
        ]);

    }

    /**
     * Updates an existing Schedule model.
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
     * Deletes an existing Schedule model.
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
     * Finds the Schedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Schedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schedule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
