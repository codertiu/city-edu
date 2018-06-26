<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Members;
/* @var $this yii\web\View */
/* @var $model backend\models\GroupTech */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-tech-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Members::find()->where(['members_status' => 4])->all(), 'id', 'fio'),
        'language' => 'ru',
        'options' => ['placeholder' => Yii::t('main','Select')],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ],
    ]); ?>

    <?= $form->field($model, 'type_of_studay',[
        'template' => '{label} * {input}{error}{hint}'
    ])->dropDownList(Yii::$app->params['type_of_study'],['prompt'=>Yii::t('main','Select')]); ?>

    <?= $form->field($model, 'status')->radioList([0=>'No active',1=>'Active']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
