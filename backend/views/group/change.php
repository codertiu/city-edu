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
        <h3 class="panel-title"><?= Yii::t('main', 'Sub Students') ?>
            <span class="panel-desc"><?= Yii::t('main', 'Created') ?> </span>
        </h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ]); ?>

        <?= $form->field($new, 'group_id', [
            'template' => '{label} * {input}{error}{hint}'
        ])->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Group::find()->where(['group_status_id' => 1])->all(), 'id', 'name'),
            'language' => 'ru',
            'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => false,
            ],
        ])->label(Yii::t('main', 'New Group')); ?>

        <?= $form->field($hSub, 'comment', [
            'template' => '{label} * {input}{error}{hint}'
        ])->textarea(['rows' => 6]) ?>
        <div class="form-group text-right">
            <?= Html::submitButton(Yii::t('main', 'Change'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

