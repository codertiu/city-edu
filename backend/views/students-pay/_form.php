<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\Contract;
/* @var $this yii\web\View */
/* @var $model backend\models\StudentsPay */
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

<div class="students-pay-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <?= $form->field($model, 'students_id')->hiddenInput(['value'=>$id])->label(false) ?>

    <?= $form->field($model, 'pay_date',[
    'template' => '{label} * {input}{error}{hint}'
    ])->widget(DatePicker::classname(), [
        'language' => 'ru',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'orientation' => "bottom"
        ],
    ]); ?>

    <?= $form->field($model, 'contract_id',[
        'template' => '{label} * {input}{error}{hint}'
    ])->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Contract::find()->where(['students_id'=>$id])->all(),'id','contract'),
        'language' => 'ru',
        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ],
    ]); ?>

    <?= $form->field($model, 'sum',[
        'template' => '{label} * {input}{error}{hint}'
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_month',[
        'template' => '{label} * {input}{error}{hint}'
    ])->widget(Select2::classname(), [
        'data' => Yii::$app->params['month'],
        'language' => 'ru',
        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
