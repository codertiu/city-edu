<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpenseCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Yii::t('main', 'Expense Category') ?>
            <span class="panel-desc"><?= Yii::t('main', 'Created') ?> </span>
        </h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ]); ?>
        <div class="row row-lg">
            <div class="col-lg-6 form-horizontal">
                <div class="form-group ">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 form-horizontal">
                <div class="form-group ">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'status')->radioList(
                            [1 => 'Yes', 2 => 'No']
                        ) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>