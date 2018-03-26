<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Receptions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">

                        <h1><?= Html::encode($this->title) ?></h1>
                        <?php echo $this->render('_form', ['model' => $form]); ?>

                        <!--<p>
                            <?= Html::a(Yii::t('main', 'Create Reception'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        -->
                        <div class="example-wrap">
                            <div class="example table-responsive">
                                <?php Pjax::begin() ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'rowOptions'=>function($model){
                                        switch($model->instance_id){
                                            case 1:
                                                return ['class'=>'info'];
                                            break;
                                            case 2:
                                                return ['class'=>''];
                                            break;
                                            case 3:
                                                return ['class'=>'warning'];
                                            break;
                                            case 4:
                                                return ['class'=>'success'];
                                            break;
                                            case 5:
                                                return ['class'=>'danger'];
                                            break;
                                        }
                                    },
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        //'edu_center_id',
                                        'name',
                                        'surname',
                                        'tel',
                                        //'coming_id',
                                        [
                                            'attribute' => 'createDate',
                                            'value' => 'createDate',
                                            'filter' => kartik\date\DatePicker::widget([
                                                'model' => $searchModel,
                                                'attribute' => 'createDate',
                                                'language' => 'ru',
                                                'pluginOptions' => [
                                                    'autoclose' => true,
                                                    'format' => 'yyyy-mm-dd',
                                                    'todayHighlight' => true,
                                                    'orientation' => "bottom"
                                                ],
                                            ]),
                                        ],
                                        //'type_edu_id',
                                        //'date_coming',
                                        //'creater',
                                        //'create_date',
                                        //'update_date',
                                        [
                                            'attribute'=>'instance_id',
                                            'value'=>'instance.name',
                                            'filter' => kartik\select2\Select2::widget([
                                                'model' => $searchModel,
                                                'attribute' => 'instance_id',
                                                'data' => yii\helpers\ArrayHelper::map(\backend\models\Instance::find()->all(),'id','name'),
                                                'theme' => kartik\select2\Select2::THEME_BOOTSTRAP,
                                                'hideSearch' => true,
                                                'options' => [
                                                    'placeholder' => Yii::t('main','Select'),
                                                ]
                                            ]),
                                        ],
                                        //'comment_id',

                                        [
                                                'class' => 'yii\grid\ActionColumn',

                                        ],
                                    ],
                                ]); ?>
                                <?php Pjax::end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>