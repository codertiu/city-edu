<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Members;

/* @var $this yii\web\View */
/* @var $model backend\models\ReceptionTech */
/* @var $form yii\widgets\ActiveForm */
$css=<<<CSS
.select2-dropdown {  
  z-index: 10060 !important;/*1051;*/
}
CSS;
$this->registerCss($css);
\kartik\select2\Select2Asset::register($this);
?>

<div class="reception-tech-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'member_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Members::find()->where(['members_status'=>4,'active'=>1])->all(), 'id', 'fio'),
                'language' => 'ru',
                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,
                ],
            ]) ?>
        </div>

        <br>
        <hr/>
        <br>
    </div>

    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
