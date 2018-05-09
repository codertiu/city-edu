<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'students_id')->textInput() ?>

    <?= $form->field($model, 'language')->textInput() ?>

    <?= $form->field($model, 'lavel')->textInput() ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'study_type')->textInput() ?>

    <?= $form->field($model, 'comfortable_time')->textInput() ?>

    <?= $form->field($model, 'type_edu_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
