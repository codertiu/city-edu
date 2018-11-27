<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Group;
use backend\models\Contract;

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
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'students_id', [
                'template' => '{label} * {input}{error}{hint}'
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Contract::find()->where('id not in (select students_id from sub_students) and students_id in (select id from students where active=1) and students_id=' . $id . '')->all(), 'id', 'contract'),
                'language' => 'ru',
                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'group_id', [
                'template' => '{label} * {input}{error}{hint}'
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Group::find()->where(['group_status_id' => 1])->all(), 'id', 'name'),
                'language' => 'ru',
                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,
                ],
            ]); ?>

        </div>
    </div>
    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

