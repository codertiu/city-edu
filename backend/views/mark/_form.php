<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Mark */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mark-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'mark_status')->textInput() ?>

    <?= $form->field($model, 'mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_id')->textInput() ?>

    <?= $form->field($model, 'students_id')->textInput() ?>

    <?= $form->field($model, 'group_id')->textInput() ?>

    <?= $form->field($model, 'absent')->textInput() ?>

    <?= $form->field($model, 'mark_type')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
