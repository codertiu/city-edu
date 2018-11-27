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
                                    'rowOptions' => function ($model) {
                                        switch ($model->active) {
                                            case 1:
                                                return ['class' => 'active'];
                                                break;
                                            case 2:
                                                return ['class' => 'danger'];
                                                break;
                                            case 3:
                                                return ['class' => 'warning'];
                                                break;
                                            case 4:
                                                return ['class' => 'success'];
                                                break;
                                        }
                                    },
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        [
                                            'attribute' => 'image',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                $img = empty($model->image)?($model->gendar==1?'images/2.jpg':'images/1.jpg'):$model->image;
                                                return Html::img('/admin/' . $img, ['width' => '80px']);
                                            },
                                        ],
                                        [
                                            'attribute' => 'name',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->name, ['/students/view', 'id' => $model->id]);
                                            },
                                        ],
                                        [
                                            'attribute' => 'tel',
                                            'format' => 'raw',
                                            'filter' => \yii\widgets\MaskedInput::widget([
                                                'model' => $searchModel,
                                                'attribute' => 'tel',
                                                'name' => 'tel',
                                                'clientOptions' => [
                                                    'alias' => '+\9\9899-999-99-99',
                                                ],
                                            ]),
                                        ],
//                                        [
//                                            'attribute' => 'gendar',
//                                            'value' => function ($model) {
//                                                return Yii::$app->params['gender'][$model->gendar];
//                                            },
//                                        ],
                                        //'address',
                                        //'member_id',
                                        //'reg_date',

                                        //'file',
                                        //'pass_file',
                                        'email',
                                        //'dob',
                                        [
                                            'attribute' => 'edu_center_id',
                                            'value' => 'eduCenterID.name',
                                            'format' => 'raw',
                                            'filter' => kartik\select2\Select2::widget([
                                                'model' => $searchModel,
                                                'attribute' => 'edu_center_id',
                                                'data' => yii\helpers\ArrayHelper::map(\backend\models\EduCenter::find()->all(),'id','name'),
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
                                        [
                                            'attribute' => 'active',
                                            'format' => 'raw',
                                            'filter' => kartik\select2\Select2::widget([
                                                'model' => $searchModel,
                                                'attribute' => 'active',
                                                'data' => Yii::$app->params['active'],
                                                'theme' => kartik\select2\Select2::THEME_BOOTSTRAP,
                                                'hideSearch' => true,
                                                'options' => [
                                                    'placeholder' => Yii::t('main', 'Select'),
                                                ],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                            ]),
                                            'value' => function ($model) {
                                                return Yii::$app->params['active'][$model->active];
                                            }
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{view}{update}'
                                        ],
                                    ],
                                    'tableOptions' =>['class' => 'table table-hover'],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

