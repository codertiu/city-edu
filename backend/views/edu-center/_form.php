<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EduCenter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edu-center
            <span class="panel-desc">Created </span>
        </h3>
    </div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>
        <div class="row row-lg">
            <div class="col-lg-6  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-6  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'checking_account')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'mfo')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'oked')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'active')->checkbox() ?>
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
