<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Call - Center');
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
                                    <center>
                                        <button id="show"
                                                class="btn btn-info"><?= Yii::t('main', 'Show/Hide') ?></button>
                                    </center>
                                    <div id="hide">
                                        <?php Pjax::begin() ?>
                                        <?= GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'rowOptions' => function ($model) {
                                                switch ($model->instance_id) {
                                                    case 1:
                                                        return ['class' => 'info'];
                                                        break;
                                                    case 2:
                                                        return ['class' => ''];
                                                        break;
                                                    case 3:
                                                        return ['class' => 'warning'];
                                                        break;
                                                    case 4:
                                                        return ['class' => 'success'];
                                                        break;
                                                    case 5:
                                                        return ['class' => 'danger'];
                                                        break;
                                                }
                                            },
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],

                                                //'id',
                                                [
                                                    'attribute' => 'edu_center_id',
                                                    'value' => 'eduCenter.name',
                                                    'format' => 'raw',
                                                    'filter' => kartik\select2\Select2::widget([
                                                        'model' => $searchModel,
                                                        'attribute' => 'edu_center_id',
                                                        'data' => yii\helpers\ArrayHelper::map(\backend\models\EduCenter::find()->all(), 'id', 'name'),
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
                                                    'attribute' => 'name',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                        return Html::a($model->name, ['/reception/view', 'id' => $model->id]);
                                                    },
                                                ],
                                                //'surname',
                                                [
                                                    'attribute' => 'tel',
                                                    'format' => 'raw',
                                                    'filter' => \yii\widgets\MaskedInput::widget([
                                                        'model' => $searchModel,
                                                        'attribute' => 's_tel',
                                                        'name' => 'tel',
                                                        'clientOptions' => [
                                                            'alias' => '+\9\9899-999-99-99',
                                                        ],
                                                    ]),
                                                    'value' => function ($model) {
                                                        return Html::a($model->tel, ['/reception/view', 'id' => $model->id]);
                                                    },
                                                ],
                                                //'call_name'
                                                //'coming_id',
                                                /*[
                                                    'attribute' => 'create_date',
                                                    'value' => 'create_date',
                                                    'filter' => kartik\date\DatePicker::widget([
                                                        'model' => $searchModel,
                                                        'attribute' => 'create_date',
                                                        'language' => 'ru',
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'yyyy-mm-dd',
                                                            'todayHighlight' => true,
                                                            'orientation' => "bottom"
                                                        ],
                                                    ]),
                                                ],*/
                                                //'type_edu_id',
                                                [
                                                    'attribute' => 'date_coming',
                                                    'format' => 'raw',
                                                    'filter' => kartik\date\DatePicker::widget([
                                                        'model' => $searchModel,
                                                        'attribute' => 'create_date',
                                                        'language' => 'ru',
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'yyyy-mm-dd',
                                                            'todayHighlight' => true,
                                                            'orientation' => "bottom"
                                                        ],
                                                    ]),
                                                    'value' => function ($model) {
                                                        return Html::a(date('d/M/Y H:i', strtotime($model->date_coming)), ['/reception/view', 'id' => $model->id]);
                                                    },
                                                ],
                                                //'creater',
                                                //'create_date',
                                                //'update_date',

                                                [
                                                    'attribute' => 'instance_id',
                                                    'value' => 'instance.name',
                                                    'filter' => kartik\select2\Select2::widget([
                                                        'model' => $searchModel,
                                                        'attribute' => 'instance_id',
                                                        //'data' => yii\helpers\ArrayHelper::map(\backend\models\Instance::find()->all(),'id','name'),
                                                        'data' => Yii::$app->params['instance_id'],
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
                                                //'comment_id',

                                                [
                                                    'class' => 'yii\grid\ActionColumn',
                                                    'template' => '{view}{update}'
                                                ],
                                            ],
                                            'tableOptions' => ['class' => 'table table-hover'],
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
    </div>

<?php
$js = <<<JS
    $('#hide').hide();
    $('#show').click(function(){
        $('#hide').toggle(); 
    });
    
JS;
$this->registerJs($js);
?>