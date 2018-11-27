<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfitCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->radioList([1 => 'Active', 2 => 'Noactive'],
                ['item' => function ($index, $label, $name, $checked, $value) {
                    $check = ($value == $checked) ? 'checked' : '';
                    $return = '<div class="radio-custom radio-primary radio-inline">';
                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="' . $label . '" ' . $check . '>';
                    $return .= '<label for="' . $label . '">' . ucwords($label) . '</label>';
                    $return .= "</div>";

                    return $return;
                }]) ?>
        </div>

        <div class="col-lg-3 form-horizontal text-left">
            <label></label>
            <br/>
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
