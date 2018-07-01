<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FirstCancelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'First Cancels');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="page">
        <div class="page-content">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <h1><?= Html::encode($this->title) ?></h1>
                            <p>
                                <?= Html::button(Yii::t('main', 'First cancel'), ['value' => Url::to(['/first-cancel/create']), 'class' => 'btn btn-success modalButton']) ?>
                            </p>
                            <div class="example-wrap">
                                <div class="example table-responsive">
                                    <?php Pjax::begin(); ?>
                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],

                                            //'id',
                                            'name',
                                            'phone',
                                            [
                                                'attribute' => 'coming_id',
                                                'value' => 'coming.name'
                                            ],
                                            'comment',
                                            //'creator_id',
                                            //'create_date',
                                            //'update_date',

                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{update}',
                                                'buttons'=> [
                                                    'update'=> function($url,$model) {
                                                            return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value' => Url::to($url), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton waves-effect waves-classic  modalButton']);
                                                    },
                                                ],
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