<?php
use yii\widgets\ActiveForm;
use backend\models\Comment;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
$css=<<<CSS
.select2-dropdown {  
  z-index: 10060 !important;/*1051;*/
}
CSS;
$this->registerCss($css);
\kartik\select2\Select2Asset::register($this);
?>

<?php $form=ActiveForm::begin([
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
])?>
    <?=$form->field($model,'comment_id')->widget(Select2::classname(), [
    'data' =>ArrayHelper::map(Comment::find()->all(),'id','name'),
    'language' => 'ru',
    'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => false,
    ],
]) ?>
    <?=$form->field($model,'commentId')->textarea(['rows'=>8])?>
    <?=Html::submitButton(Yii::t('main','Enter'),['class'=>'btn btn-success'])?>
<?php ActiveForm::end()?>
<?php
$js = <<<JS
$.ready(function() {
    $('#reception-comment_id').select2();
});
JS;
$this->registerJs($js);
?>
