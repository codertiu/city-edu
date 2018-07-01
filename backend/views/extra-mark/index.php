<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExtraMarkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Extra Marks');
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
                            <?= Html::a(Yii::t('main', 'Create Extra Mark'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                [
                                    'attribute' => 'member_id',
                                    'value' => 'member.fio',
                                    'filter' => kartik\select2\Select2::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'member_id',
                                        'data' => yii\helpers\ArrayHelper::map(\backend\models\Members::find()->all(),'id','fio'),
                                        'theme' => kartik\select2\Select2::THEME_BOOTSTRAP,
                                        'hideSearch' => true,
                                        'options' => [
                                            'placeholder' => Yii::t('main','Select'),
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]),
                                ],
                                [
                                    'attribute' => 'student_id',
                                    'value' => 'student.fullNameId',
                                    'filter' => kartik\select2\Select2::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'student_id',
                                        'data' => yii\helpers\ArrayHelper::map(\backend\models\Students::find()->all(),'id','fullName'),
                                        'theme' => kartik\select2\Select2::THEME_BOOTSTRAP,
                                        'hideSearch' => true,
                                        'options' => [
                                            'placeholder' => Yii::t('main','Select'),
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]),
                                ],
                                [
                                    'attribute' => 'date',
                                    'value' => function ($model) {
                                        return date('d/M/Y', strtotime($model->date));
                                    },
                                    'filter' => kartik\date\DatePicker::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'date',
                                        'language' => 'ru',
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'yyyy-mm-dd',
                                            'todayHighlight' => true,
                                            'orientation' => "bottom"
                                        ],
                                    ]),
                                ],

                                'mark',

                                ['class' => 'yii\grid\ActionColumn',
                                    'template' => '{update}'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
