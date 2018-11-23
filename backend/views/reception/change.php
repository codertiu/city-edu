<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use backend\models\EduCenter;
use kartik\select2\Select2;
use backend\models\TypeEdu;

$css=<<<CSS
.select2-dropdown {  
  z-index: 10060 !important;/*1051;*/
}
CSS;
$this->registerCss($css);
\kartik\select2\Select2Asset::register($this);
?>
<? $form = ActiveForm::begin() ?>
<?= $form->field($model, 'edu_center_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(EduCenter::find()->all(), 'id', 'name'),
    'value' => 1,
    'language' => 'ru',
    'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => false,
    ],
]); ?>
<?= $form->field($model, 'date_coming')->widget(DateTimePicker::classname(), [
    'language' => 'ru',
    'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd hh:ii',
        'autoclose' => true,
        'todayHighlight' => true,
        'orientation' => "bottom"
    ],
]); ?>
<?= $form->field($model, 'type_edu_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(TypeEdu::find()->all(), 'id', 'name'),
    'language' => 'ru',
    'options' => ['placeholder' => 'Выберите Вид ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => false,
    ],
]); ?>
<?= Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-success']) ?>
<? ActiveForm::end(); ?>