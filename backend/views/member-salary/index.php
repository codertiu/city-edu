<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MemberSalarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member Salaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <?php Pjax::begin(); ?>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <p>
                            <?= Html::a('Create Member Salary', ['create'], ['class' => 'btn btn-success']) ?>
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
                                            'attribute' => 'member_id',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->member->fio, ['/member-salary/list', 'id' => $model->member->id]);
                                            },
                                            'filter' => kartik\select2\Select2::widget([
                                                'model' => $searchModel,
                                                'attribute' => 'member_id',
                                                //'data' => yii\helpers\ArrayHelper::map(\backend\models\Instance::find()->all(),'id','name'),
                                                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Members::find()->all(), 'id', 'fio'),
                                                'theme' => kartik\select2\Select2::THEME_BOOTSTRAP,
                                                'hideSearch' => true,
                                                'options' => [
                                                    'placeholder' => Yii::t('main', 'Select'),
                                                ],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                            ]),
                                        ],

//                                        'sum',
//                                        'currency_id',
//                                        'date',
//                                        'comment',
//                                        'type_pay',
                                        //'create_date',
                                        //'update_date',

                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => ''
                                        ],
                                    ],
                                ]); ?>
                                <?php Pjax::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

