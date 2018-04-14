<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EduCenter;
use kartik\select2\Select2;
use backend\models\Coming;
use backend\models\TypeEdu;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use backend\models\Comment;
use backend\models\Instance;

/* @var $this yii\web\View */
/* @var $model backend\models\Reception */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-body">
        <?php  ?>
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'action' =>['reception/create'],
            'method' => 'post'

        ]); ?>


        <div class="row row-lg">
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'edu_center_id',[
                            'template' => '{label} * {input}{error}{hint}'])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(EduCenter::find()->all(), 'id', 'name'),
                            'language' => 'ru',
                            'options' => ['placeholder' => Yii::t('main','Выберите Вид ...'), 'orientation' => 'bottom'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'name',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
                            'language' => 'ru',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'orientation' => "bottom"
                            ],
                        ]);

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'tel',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ])  ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'phone2')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'phone3')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'phone4')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'type_edu_id',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(TypeEdu::find()->all(), 'id', 'name'),
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
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'lavel')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'language')->radioList(
                            [1 => 'Uz', 2 => 'Ru', 3 => 'Uz-RU']
                        ) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'coming_id',[
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'date_coming',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(DateTimePicker::classname(), [
                            'language' => 'ru',
                            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd hh:ii',
                                'autoclose' => true,
                                'todayHighlight' => true,
                                'orientation' => "bottom"
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'comfortable_time')->radioList(Yii::$app->params['cofortable_time']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'time')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '99:99 from 99:99 to',
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-12 form-horizontal">
                <div class="form-group form-material">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'comment')->textarea(['rows' => 5]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">
            <div class="col-lg-12 form-horizontal">
                <div class="form-group form-material">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'creater',[
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username'),
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
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


