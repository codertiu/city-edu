<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExtraMarkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="extra-mark-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'member_id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'mark') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('main', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
