<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Students;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>
    <div class="row row-lg">
        <div class="col-lg-4  form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'student_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Students::find()->all(), 'id', 'fullName'),
                        'language' => 'ru',
                        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'disabled' => true],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'multiple' => false,
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4  form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'type_message')->radioList([1=>Yii::t('main','ariza'),2=>Yii::t('main','taklif')],['disabled'=>false]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4  form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'create_date')->textInput(['disabled' => true]) ?>
                </div>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'disabled' => true]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
