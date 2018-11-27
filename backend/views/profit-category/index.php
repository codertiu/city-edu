<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfitCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Profit Categories');
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
                                <?= $this->render('create', ['model' => $model]) ?>
                            </p> <?php Pjax::begin(); ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    //'id',
                                    'name',
                                    [
                                        'attribute' => 'status',
                                        'format' => 'raw',
                                        'filter' => Select2::widget([
                                            'model' => $searchModel,
                                            'attribute' => 'status',
                                            'data' => [1 => 'active', 2 => 'noactive'],
                                            'options' => [
                                                'placeholder' => Yii::t('main', 'Select'),
                                            ],
                                            'language' => 'ru',
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                                'multiple' => false,
                                            ],
                                        ]),
                                        'value' => function ($model) {
                                            return $model->status == 1 ? 'active' : 'noactive';
                                        }
                                    ],

                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{update}',
                                        'buttons' => [
                                            'update' => function ($url, $model) {
                                                return Html::button('<i class="icon md-edit"></i>', ['value' => \yii\helpers\Url::to(['/profit-category/update', 'id' => $model->id]), 'class' => 'btn btn-success modalButton']);
                                            },
                                        ],
                                    ],
                                ],
                                'tableOptions' => ['class' => 'table table-hover'],
                            ]); ?>
                            <?php Pjax::end(); ?>
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