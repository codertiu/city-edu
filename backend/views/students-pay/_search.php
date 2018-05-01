<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsPaySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-pay-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pay_date') ?>

    <?= $form->field($model, 'contract_id') ?>

    <?= $form->field($model, 'students_id') ?>

    <?= $form->field($model, 'sum') ?>

    <?php // echo $form->field($model, 'for_month') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('main', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
