<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsLeave */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-leave-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'students_is')->textInput() ?>

    <?= $form->field($model, 'comment_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
