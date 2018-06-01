<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

$this->title = Yii::t('main','Add Students');
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">

                <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
                <div class="row">
                    <div class="col-md-6">
                        <? $first->group_id = $group?>
                        <?= $form->field($first, 'group_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(\backend\models\Group::find()->where(['group_status_id' => 1])->all(), 'id', 'name'),
                            'language' => 'ru',
                            'options' => ['placeholder' => Yii::t('main', 'Select')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($first, 'begin_date',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(DatePicker::classname(), [
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'options' => ['placeholder' => Yii::t('main', 'Enter date ...')],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>
                    </div>


                    <div class="col-md-12">
                        <?php DynamicFormWidget::begin([
                            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                            'widgetBody' => '.container-items', // required: css class selector
                            'widgetItem' => '.item', // required: css class
                            'limit' => 50, // the maximum times, an element can be added (default 999)
                            'min' => 1, // 0 or 1 (default 1)
                            'insertButton' => '.add-item', // css class
                            'deleteButton' => '.remove-item', // css class
                            'model' => $model[0],
                            'formId' => 'dynamic-form',
                            'formFields' => [
                                'students_id'
                            ],
                        ]); ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-money"></i> <?= Yii::t('main', 'Students') ?>
                                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i
                                                class="glyphicon glyphicon-plus"></i> <?= Yii::t('main', 'Add') ?>
                                    </button>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <br/>
                                <div class="container-items"><!-- widgetBody -->
                                    <?php foreach ($model as $i => $modelAddress): ?>
                                        <div class="item panel panel-default"><!-- widgetItem -->
                                            <div class="panel-heading">
                                                <h3 class="panel-title pull-left"><?= Yii::t('main', 'Students') ?></h3>
                                                <div class="pull-right">
                                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                                                class="glyphicon glyphicon-minus"></i></button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-22">
                                                        <?
                                                            $array = \backend\models\SubStudents::find()->where(['group_id'=>$group])->all();
                                                            $b = [];
                                                            foreach ($array as $a){
                                                                  $b [] =$a->students_id;
                                                            }

                                                        ?>
                                                        <?= $form->field($modelAddress, "[{$i}]students_id",[
                                                            'template' => '{label} * {input}{error}{hint}'
                                                        ])->widget(Select2::classname(), [
                                                            'data' => ArrayHelper::map(\backend\models\Students::find()->where(['active' => 1])->where(['not in','id',$b])->all(), 'id', 'fullName'),
                                                            'language' => 'ru',
                                                            'options' => ['placeholder' => Yii::t('main', 'Select')],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]) ?>
                                                    </div>
                                                </div><!-- .row -->

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div><!-- .panel -->
                        <?php DynamicFormWidget::end(); ?>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= Html::submitButton($first->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $first->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>

                </div>
                <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
</div>