<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EduCenter;
use kartik\select2\Select2;
use backend\models\Members;
use backend\models\GroupStatus;
use kartik\date\DatePicker;
use backend\models\Since;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'id' => 'dynamic-form'
    ]); ?>

    <div class="col-md-6">
        <div class="row row-lg">
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'edu_center_id',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(EduCenter::find()->all(), 'id', 'name'),
                            'language' => 'ru',
                            'options' => ['placeholder' => 'Выберите Вид ...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ]);

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'member_id',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Members::find()->where(['members_status' => 4])->all(), 'id', 'fio'),
                            'language' => 'ru',
                            'options' => ['placeholder' => Yii::t('main','Select')],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ])

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'group_status_id',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(GroupStatus::find()->all(), 'id', 'name'),
                            'language' => 'ru',
                            'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-6 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'name',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'lavel',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => Yii::$app->params['lavel'],
                            'language' => 'ru',
                            'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'begin_date',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(DatePicker::classname(), [
                                'language' => 'ru',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ],
                            ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'end_date',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(DatePicker::classname(), [
                                'language' => 'ru',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ],
                            ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'since_id',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Since::find()->all(), 'id', 'name'),
                            'language' => 'ru',
                            'options' => ['placeholder' => 'Выберите Вид ...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ]);

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 form-horizontal">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 3, // the maximum times, an element can be added (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $second[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                "teacher_id",
                "type_of_studay",
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
                    <?php foreach ($second as $i => $modelAddress): ?>
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <?= $form->field($modelAddress, "[{$i}]type_of_studay",[
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

    </div>
    <div class="col-md-12">
        <div class="form-group text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

