<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\EduCenter;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model backend\models\Members */
/* @var $form yii\widgets\ActiveForm */

$gendar = [

  '1' => 'Erkak',

  '0' => 'Ayol',

];
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Members
            <span class="panel-desc">Created </span>
        </h3>
    </div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row row-lg">
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
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
                    </div>
                </div>
            </div>
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        </div>

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gendar')->dropDownlist($gendar, ['prompt' => '---']); ?>
    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        

</div>
</div>
