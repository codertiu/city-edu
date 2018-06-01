<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EduCenter;
use kartik\select2\Select2;
use backend\models\Group;
use backend\models\Room;
use kartik\time\TimePicker;
use backend\models\Members;
use backend\models\GroupStatus;
use kartik\date\DatePicker;
use backend\models\Since;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="panel-body">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form'
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($first, 'group_id',[
                'template' => '{label} * {input}{error}{hint}'
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Group::find()->all(), 'id', 'name'),
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите Вид ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($first, 'day_id',[
                'template' => '{label} * {input}{error}{hint}'
            ])->radioList(Yii::$app->params['comfortable_time']); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($first, "active",[
                'template' => '{label} * {input}{error}{hint}'
            ])->checkbox() ?>
        </div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be added (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $model[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            "active",
            "teacher_id",
            "room_id",
            "begin_date",
            "end_date",
            "type_of_study"
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="glyphicon glyphicon-envelope"></i> <?= Yii::t('main','Teacher'); ?>
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> <?= Yii::t('main','Add') ?></button>
            </h4>
        </div>
        <br>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
                <?php foreach ($model as $i => $modelAddress): ?>
                    <div class="item panel panel-default"><!-- widgetItem -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left"><?= Yii::t('main','Teacher')?></h3>
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
                                <div class="col-md-3">
                                    <?= $form->field($modelAddress, "[{$i}]teacher_id",[
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->widget(Select2::classname(), [
                                        'data' => ArrayHelper::map(Members::find()->where(['members_status' => 4])->all(), 'id', 'fio'),
                                        'language' => 'ru',
                                        'options' => ['placeholder' => Yii::t('main','Select')],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'multiple' => false,
                                        ],
                                    ]);?>
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($modelAddress, "[{$i}]room_id",[
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->widget(Select2::classname(), [
                                        'data' => ArrayHelper::map(Room::find()->all(), 'id', 'room'),
                                        'language' => 'ru',
                                        'options' => ['placeholder' => Yii::t('main','Select')],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'multiple' => false,
                                        ],
                                    ]);?>
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($modelAddress, "[{$i}]begin_time",[
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->widget(TimePicker::className(),
                                        [
                                            //'readonly' => true,
                                            'pluginOptions' => [
                                                'showSeconds' => false,
                                                'showMeridian' => false,
                                                'minuteStep' => 1,
                                                'secondStep' => 5,
                                            ],
                                            'options' => [
                                                'class' => 'form-control',
                                            ],
                                        ]); ?>
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($modelAddress, "[{$i}]end_time",[
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->widget(TimePicker::className(),
                                        [
                                            //'readonly' => true,
                                            'pluginOptions' => [
                                                'showSeconds' => false,
                                                'showMeridian' => false,
                                                'minuteStep' => 1,
                                                'secondStep' => 5,
                                            ],
                                            'options' => [
                                                'class' => 'form-control',
                                            ],
                                        ]); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($modelAddress, "[{$i}]since_id",[
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->widget(Select2::classname(), [
                                        'data' => ArrayHelper::map(Since::find()->all(), 'id', 'name'),
                                        'language' => 'ru',
                                        'options' => ['placeholder' => Yii::t('main','Select')],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'multiple' => false,
                                        ],
                                    ]); ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($modelAddress, "[{$i}]type_of_study",[
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->dropDownList(Yii::$app->params['type_of_study'],['prompt'=>Yii::t('main','Select')]); ?>
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
