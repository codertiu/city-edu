<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\select2\Select2;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentsPaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Students Pays');
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
                            <? if (User::hasRole('Administration')): ?>
                                <p>
                                    <?= Html::button(Yii::t('main', 'Create Students Pay'), ['value' => Url::to(['/students-pay/pay-all']), 'class' => 'btn btn-success modalButton']) ?>
                                </p>
                            <? endif; ?>
                            <div class="example-wrap">
                                <div class="example table-responsive">
                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],

                                            //'id',
                                            [
                                                'attribute' => 'students_id',
                                                'value' => 'students.fullName',
                                                'format' => 'raw',
                                                'value' => function ($model) {
                                                    return Html::a($model->students->fullName, ['/students/view', 'id' => $model->students->id]);
                                                },
                                                'filter' => Select2::widget([
                                                    'model' => $searchModel,
                                                    'attribute' => 'students_id',
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Students::find()->where('id in(select students_id from Contract)')->all(), 'id', 'fullName'),
                                                    'options' => [
                                                        'placeholder' => Yii::t('main', 'Select'),
                                                    ],
                                                    'language' => 'ru',
                                                    'pluginOptions' => [
                                                        'allowClear' => true,
                                                        'multiple' => false,
                                                    ],
                                                ]),
                                                'contentOptions' => ['style' => 'width: 30%;'],
                                            ],
                                            [
                                                'attribute' => 'contract_id',
                                                'value' => 'contract.contract',
                                                'filter' => Select2::widget([
                                                    'model' => $searchModel,
                                                    'attribute' => 'contract_id',
                                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Contract::find()->all(), 'id', 'contract'),
                                                    'options' => [
                                                        'placeholder' => Yii::t('main', 'Select'),
                                                    ],
                                                    'language' => 'ru',
                                                    'pluginOptions' => [
                                                        'allowClear' => true,
                                                        'multiple' => false,
                                                    ],
                                                ]),
                                            ],
                                            [
                                                'attribute' => 'create_date',
                                                'value' => function ($model) {
                                                    return date('d/M/Y', strtotime($model->create_date));
                                                },
                                                'filter' => \kartik\date\DatePicker::widget([
                                                    'model' => $searchModel,
                                                    'attribute' => 'create_date',
                                                    'type' => \kartik\date\DatePicker::TYPE_COMPONENT_PREPEND,
                                                    'pluginOptions' => [
                                                        'autoclose' => true,
                                                        'orientation' => "bottom",
                                                        'format' => 'yyyy-mm-dd'
                                                    ]
                                                ]),
                                                'contentOptions' => ['style' => 'width: 20%;'],
                                            ],
                                            /*[
                                                'attribute'=>'user_id',
                                                'value'=>'user.username'
                                            ],*/
                                            [
                                                'attribute' => 'sum',
                                                'contentOptions' => ['style' => 'width: 10%;'],
                                            ],
                                            [
                                                'attribute' => 'for_month',
                                                'filter' => Select2::widget([
                                                    'model' => $searchModel,
                                                    'attribute' => 'for_month',
                                                    'data' => Yii::$app->params['month'],
                                                    'options' => [
                                                        'placeholder' => Yii::t('main', 'Select'),
                                                    ],
                                                    'language' => 'ru',
                                                    'pluginOptions' => [
                                                        'allowClear' => true,
                                                        'multiple' => false,
                                                    ],
                                                ]),
                                                'value'=>function($model){
                                                    return \Yii::$app->params['month'][$model->for_month];
                                                },
                                                'contentOptions' => ['style' => 'width: 10%;'],
                                            ],

                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{view} {update}',
                                                'buttons' => [
                                                    'view' => function ($url, $model) {
                                                        return Html::a(
                                                            '<span class="glyphicon glyphicon-eye-open"></span>',
                                                            $url, ['class' => 'btn btn-success']);
                                                    },
                                                    'update' => function ($url, $model) {
                                                        return Html::button('<i class="icon md-edit"></i>', ['value' => Url::to(['/students-pay/update2', 'id' => $model->id]), 'class' => 'btn btn-success modalButton']);
                                                    },
                                                ],
                                            ],
                                        ],
                                        'tableOptions' => ['class' => 'table table-hover'],
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
Modal::begin([
    'options' => [
        //'id'=>'kartik-modal',
        //'tabindex' => false,
    ],
    'header' => Yii::t('main', 'Modal'),
    'id' => 'modal',
    'size' => 'modal-lg'
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
<?php
$js = <<<JS
    $(function(){
        $('.modalButton').click(function(){
            $('#modal').modal('show')
              .find('#modalContent')
              .load($(this).attr('value'));
        });
    });
JS;
$this->registerJs($js);
?>