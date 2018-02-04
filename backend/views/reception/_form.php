<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EduCenter;
use kartik\select2\Select2;
use backend\models\Coming;
use backend\models\TypeEdu;

/* @var $this yii\web\View */
/* @var $model backend\models\Reception */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Reception
            <span class="panel-desc">Created </span>
        </h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?=$form->field($model, 'edu_center_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(EduCenter::find()->all(), 'id', 'name'),
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите Вид ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => false,
            ],
        ]);

        ?>

        <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

        <?=$form->field($model, 'coming_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Coming::find()->all(), 'id', 'name'),
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите Вид ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => false,
            ],
        ]);

        ?>

        <?=$form->field($model, 'type_edu_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(TypeEdu::find()->all(), 'id', 'name'),
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите Вид ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => false,
            ],
        ]);

        ?>

        <?= $form->field($model, 'date_coming')->textInput() ?>

        <?= $form->field($model, 'creater')->textInput() ?>

        <?= $form->field($model, 'create_date')->textInput() ?>

        <?= $form->field($model, 'update_date')->textInput() ?>

        <?= $form->field($model, 'instance_id')->textInput() ?>

        <?= $form->field($model, 'comment_id')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
