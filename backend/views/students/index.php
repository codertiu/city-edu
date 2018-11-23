<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">

                        <h1><?= Html::encode($this->title) ?></h1>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <p>
                            <?= Html::a(Yii::t('main', 'Create Students'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <div class="example-wrap">
                            <div class="example table-responsive">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        [
                                            'attribute' => 'name',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->name, ['/students/view', 'id' => $model->id]);
                                            },
                                        ],
                                        'tel',
                                        [
                                                'attribute'=>'gendar',
                                                'value'=>Yii::$app->params['gender']['gendar'],
                                        ],
                                        //'address',
                                        //'member_id',
                                        //'reg_date',
                                        //'edu_center_id',
                                        //'image',
                                        //'file',
                                        //'pass_file',
                                        //'email:email',
                                        //'dob',
                                        //'active',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

