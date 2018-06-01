<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\Group;
/* @var $this yii\web\View */
/* @var $model backend\models\SubStudents */
/* @var $form yii\widgets\ActiveForm */
$css = <<<CSS
.datepicker {
      z-index: 9999 !important; /* has to be larger than 1050 */
    }
.select2-dropdown {
  z-index: 10060 !important;/*1051;*/
}
CSS;
$this->registerCss($css);

\kartik\select2\Select2Asset::register($this);
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=Yii::t('main','Sub Students')?>
            <span class="panel-desc"><?=Yii::t('main','Created')?> </span>
        </h3>
    </div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <? if($model->isNewRecord) {?>
        <?= $form->field($model, 'students_id')->hiddenInput(['value'=>$id])->label(false) ?>
    <?}?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'begin_date',[
                'template' => '{label} * {input}{error}{hint}'
                ])->widget(DatePicker::classname(), [
                    'language' => 'ru',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    //'value'=>'2018-04-12',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'orientation' => "bottom"
                    ],
                ]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
                    'language' => 'ru',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    //'value'=>'2018-04-12',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'orientation' => "bottom"
                    ],
                ]); ?>
            </div>
        </div>

    <?= $form->field($model, 'group_id',[
        'template' => '{label} * {input}{error}{hint}'
    ])->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Group::find()->all(), 'id', 'name'),
        'language' => 'ru',
        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
</div>

