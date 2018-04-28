<?php
use yii\widgets\ActiveForm;
use backend\models\Comment;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>

<?php $form=ActiveForm::begin([
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
])?>
    <?=$form->field($model,'comment_id')->dropDownList(ArrayHelper::map(Comment::find()->all(),'id','name'),['prompt'=>Yii::t('main','Select')]) ?>
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
