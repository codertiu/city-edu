<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
$this->title = Yii::t('main','Call - center');
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title"><?= Yii::t('main', 'Call - center') ?></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <?= Html::button(Yii::t('main', 'First cancel'), ['value' => Url::to(['/first-cancel/create']), 'class' => 'btn btn-danger modalButton']) ?>
                    </div>
                    <div class="col-md-4">
                        <?=Html::a(Yii::t('main','Call Center'),['/reception/call-center'],['class'=>'btn btn-success'])?>
                    </div>
                    <div class="col-md-4">
                        <?=Html::a(Yii::t('main','Rad etganlar'),['/reception/cancel'],['class'=>'btn btn-primary'])?>
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