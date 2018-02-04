<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReceptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reception-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'edu_center_id') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'coming_id') ?>

    <?php // echo $form->field($model, 'type_edu_id') ?>

    <?php // echo $form->field($model, 'date_coming') ?>

    <?php // echo $form->field($model, 'creater') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'instance_id') ?>

    <?php // echo $form->field($model, 'comment_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('main', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
