<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\TypeEdu;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Contract */
/* @var $form yii\widgets\ActiveForm */
$css = <<<CSS
.datepicker {
      z-index: 9999 !important; /* has to be larger than 1050 */
    }
.select2-dropdown {
  z-index: 10060 !important;/*1051;*/
}
CSS;
$this->registerCss($css);

\kartik\select2\Select2Asset::register($this);
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <? if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'students_id')->hiddenInput(['value' => $id])->label(false) ?>
    <? } else { ?>
        <?= $form->field($model, 'students_id')->hiddenInput(['value' => $id])->label(false) ?>
    <?php } ?>

    <? if ($model->isNewRecord) { ?>
        <?
        $st = \backend\models\Students::findOne($id)->edu_center_id;
        $st = $st<10?"0$st":$st;
        $model->contract = $st.'/'.substr(date('Y'),2,2).'/'.date('m');?>
        <?= $form->field($model, 'contract',[
            'template' => '{label} * {input}{error}{hint}'
        ])->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '99/99/99/9999',
        ])  ?>
    <? } else { ?>
        <?= $form->field($model, 'contract')->textInput(['maxlength' => true,'disabled'=>true]) ?>
    <?php } ?>

    <?= $form->field($model, 'sum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'orientation' => "bottom"
        ],
    ]); ?>

    <?= $form->field($model, 'type_edu_id', [
        'template' => '{label} * {input}{error}{hint}'
    ])->widget(Select2::classname(), [
        'data' => ArrayHelper::map(TypeEdu::find()->all(), 'id', 'name'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите Вид ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ],
    ]);

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
