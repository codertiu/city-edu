<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\EduCenter;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


// use yii\helpers\ArrayHelper;
// use backend\models\EduCenter;
// use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\Members */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Yii::t('main', 'Members') ?>
            <span class="panel-desc"><?= Yii::t('main', 'Created') ?> </span>
        </h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ]); ?>
        <div class="row row-lg">
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">

                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'edu_center_id')->widget(Select2::classname(), [
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
            <div class="col-lg-6  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'tel', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-6 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'gendar')->radioList(Yii::$app->params['gender']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <label class="control-label">Active</label>
                        <?= $form->field($model, 'active')->checkbox() ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'fileimg')->fileInput() ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'filecv')->fileInput() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-lg">
            <div class="col-lg-6 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username'),
                            'language' => 'ru',
                            'options' => ['placeholder' => 'Выберите Вид ...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'members_status')->radioList(Yii::$app->params['member_status']); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
