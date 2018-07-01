<?php

namespace backend\controllers;

use Yii;
use backend\models\ExtraMark;
use backend\models\ExtraMarkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Model;

/**
 * ExtraMarkController implements the CRUD actions for ExtraMark model.
 */
class ExtraMarkController extends Controller
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
     * Lists all ExtraMark models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExtraMarkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new ExtraMark model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $first = new ExtraMark();
        $model = [new ExtraMark];
        if ($first->load(Yii::$app->request->post())) {

            $model = Model::createMultiple(ExtraMark::classname());
            Model::loadMultiple($model, Yii::$app->request->post());

            foreach ($model as $m) {
                $m->member_id = $first->member_id;
                $m->date = $first->date;
                $m->save();
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'first' => $first,
            'model' => (empty($model)) ? [new Schedule] : $model
        ]);

    }

    /**
     * Updates an existing ExtraMark model.
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
     * Deletes an existing ExtraMark model.
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
     * Finds the ExtraMark model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExtraMark the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExtraMark::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }
}
