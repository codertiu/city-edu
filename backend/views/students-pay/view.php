<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsPay */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Students Pays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$css = <<<CSS
button{
background: none;
color: inherit;
border: none;
padding: 0;
font: inherit;
cursor: pointer;
outline: inherit;
}
CSS;
$this->registerCss($css);

?>
<div class="page">
    <div class="page-content">

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-actions">
                    <div class="item-actions">
                            <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-arrow-left"></i>', ['/students-pay']) ?>
                            </span>
                        <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                            <?= Html::button('<i class="icon md-edit"></i>', ['value' => Url::to(['/students-pay/update2', 'id' => $model->id]), 'class' => 'modalButton']) ?>
                        </span>
                        <!--<span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-delete" aria-hidden="true"></i>', ['delete', 'id' => $model->id], [
                                    'data' => [
                                        'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </span>-->
                    </div>
                </div>
                <h3 class="panel-title"><?= $model->students->fullName ?></h3>
            </div>
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'id',
                        'contract.contract',
                        //'students_id',
                        'sum',
                        [
                            'attribute' => 'type_pay_id',
                            'value' => function ($model) {
                                return Yii::$app->params['type_pay'][$model->type_pay_id];
                            }
                        ],
                        [
                            'attribute' => 'for_month',
                            'value' => function ($model) {
                                return Yii::$app->params['month'][$model->for_month];
                            }
                        ]
                    ],
                ]) ?>
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
