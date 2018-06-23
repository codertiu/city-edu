<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = Yii::t('main', 'list');
?>
    <div class="page-header">
        <h1 class="page-title"><?=$name?></h1>

        <div class="page-header-actions">
            <button type="button" class="btn btn-info" onclick="jQuery('#table').print()">
                <i class="glyphicon glyphicon-print"></i>
            </button>
            <?= Html::button(Yii::t('main', 'Create Member Salary'), ['value' => Url::to(['/member-salary/create2', 'id' => $id]), 'class' => 'btn btn-primary modalButton']) ?>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <table class="table table-bordered" id="table">
                <thead>
                <tr>
                    <td><?= Yii::t('main', 'Pay date') ?></td>
                    <td><?= Yii::t('main', 'Sum') ?></td>
                    <td><?= Yii::t('main', 'Currency') ?></td>
                    <td><?= Yii::t('main', 'Type Pay') ?></td>
                    <td><?= Yii::t('main', 'Comment') ?></td>
                    <td><?= Yii::t('main', 'Action') ?></td>
                </tr>
                </thead>
                <tbody>
                <? foreach ($model as $one) { ?>
                    <tr>
                        <td><?= date('d/M/Y', strtotime($one->date)) ?></td>
                        <td><?= $one->sum ?></td>
                        <td><?= Yii::$app->params['currency'][$one->currency_id] ?></td>
                        <td><?= Yii::$app->params['type_pay'][$one->type_pay] ?></td>
                        <td><?= $one->comment ?></td>
                        <td>
                            <?= Html::button('<i class="icon md-edit"></i>', ['value' => Url::to(['/member-salary/update', 'id' => $one->id]), 'class' => 'btn btn-sm btn-icon btn-flat btn-default modalButton']) ?>
                            <?= Html::a('<i class="icon md-delete"></i>', ['delete', 'id' => $one->id], [
                                'class' => 'btn btn-sm btn-icon btn-flat btn-default',
                                'data' => [
                                    'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </td>

                    </tr>
                <? } ?>
                </tbody>
                <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
            </table>
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