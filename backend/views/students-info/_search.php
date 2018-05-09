<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'students_id') ?>

    <?= $form->field($model, 'language') ?>

    <?= $form->field($model, 'lavel') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'study_type') ?>

    <?php // echo $form->field($model, 'comfortable_time') ?>

    <?php // echo $form->field($model, 'type_edu_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('main', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
