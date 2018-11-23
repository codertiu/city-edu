<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
?>

<div class="example-wrap">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 's_name') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 's_tel')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+\9\9899-999-99-99',
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'date_coming')->widget(DatePicker::classname(), [
                'language' => 'ru',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                //'value'=>'2018-04-12',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'orientation' => "bottom"
                ],
            ]); ?>
        </div>
    </div>
    <div class="form-group text-center" >
        <?= Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('main', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
