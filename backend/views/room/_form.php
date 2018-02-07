<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\EduCenter;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model backend\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Room
            <span class="panel-desc">Created </span>
        </h3>
    </div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>

        <?=$form->field($model, 'edu_center_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(EduCenter::find()->all(), 'id', 'name'),
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите Вид ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => false,
            ],
        ]);

        ?>

    <?= $form->field($model, 'room')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
