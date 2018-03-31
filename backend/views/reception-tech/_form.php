<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use backend\models\Members;
/* @var $this yii\web\View */
/* @var $model backend\models\ReceptionTech */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reception-tech-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'member_id')->dropDownList(
        ArrayHelper::map(Members::find()->all(), 'id', 'fio'),
        ['prompt'=>Yii::t('main','Выберите Вид ...')]
    )?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'date')->widget(DateTimePicker::classname(), [
        'language' => 'ru',
        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd hh:ii',
            'autoclose' => true,
            'todayHighlight' => true,
            'orientation' => "bottom"
        ],
    ]); ?>
    </div>

    <br>
    <hr/>
    <br>
</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
