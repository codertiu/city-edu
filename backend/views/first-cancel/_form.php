<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use backend\models\Instance;
use backend\models\Coming;
/* @var $this yii\web\View */
/* @var $model backend\models\FirstCancel */
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

<div class="first-cancel-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <?= $form->field($model, 'name', [
        'template' => '{label} * {input}{error}{hint}'
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone', [
        'template' => '{label} * {input}{error}{hint}'
    ])->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '+\9\9899-999-99-99',
    ]) ?>

    <?= $form->field($model, 'coming_id', [
        'template' => '{label} * {input}{error}{hint}'
    ])->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Coming::find()->all(), 'id', 'name'),
        'language' => 'ru',
        'options' => ['placeholder' => Yii::t('main','Выберите Вид ...'), 'orientation' => 'bottom'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ],
    ]);

    ?>

    <?= $form->field($model,'comment')->textarea(['rows'=>5])?>

    <?= $form->field($model, 'creator_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
