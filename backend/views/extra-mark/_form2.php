<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\Members;

/* @var $this yii\web\View */
/* @var $model backend\models\ExtraMark */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'member_id', [
                'template' => '{label} * {input}{error}{hint}'
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\backend\models\Members::find()->where(['active' => 1, 'members_status' => 4])->all(), 'id', 'fio'),
                'language' => 'ru',
                'options' => ['placeholder' => Yii::t('main', 'Select')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'date', [
                'template' => '{label} * {input}{error}{hint}'
            ])->widget(DatePicker::classname(), [
                'language' => 'ru',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'orientation' => "bottom"
                ],
            ]); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'student_id',[
                'template' => '{label} * {input}{error}{hint}'
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\backend\models\Students::find()->where(['active' => 1])->all(), 'id', 'fullNameId'),
                'language' => 'ru',
                'options' => ['placeholder' => Yii::t('main','Select')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,
                ],
            ]);?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'mark',[
                'template' => '{label} * {input}{error}{hint}'
            ])->textInput()?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
