<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\Members;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\ExtraMark */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">

    <?php $form = ActiveForm::begin([
            'id' => 'dynamic-form']
    ); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($first, 'member_id', [
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
            <?= $form->field($first, 'date', [
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

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 16, // the maximum times, an element can be added (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $model[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            "student_id",
            "mark"
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="glyphicon glyphicon-envelope"></i> <?= Yii::t('main','Students'); ?>
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> <?= Yii::t('main','Add') ?></button>
            </h4>
        </div>
        <br>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
                <?php foreach ($model as $i => $modelAddress): ?>
                    <div class="item panel panel-default"><!-- widgetItem -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left"><?= Yii::t('main','Students')?></h3>
                            <div class="pull-right">
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]id");
                            }
                            ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($modelAddress, "[{$i}]student_id",[
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
                                    <?= $form->field($modelAddress, "[{$i}]mark",[
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->textInput()?>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- .panel -->
    <?php DynamicFormWidget::end(); ?>


    <div class="form-group">
        <?= Html::submitButton($first->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $first->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
