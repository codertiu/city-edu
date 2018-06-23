<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpenseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expense-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'speciality') ?>

    <?= $form->field($model, 'sum') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'currency_id') ?>

    <?php // echo $form->field($model, 'type_pay_id') ?>

    <?php // echo $form->field($model, 'expense_category_id') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('main', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
