<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\TypeEdu;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */
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

    <div class="panel-body">

        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ]); ?>

        <? if ($model->isNewRecord) { ?>
            <?= $form->field($model, 'students_id')->hiddenInput(['value' => $id])->label(false) ?>
        <? } else { ?>
            <div class="row row-lg">
                <div class="col-lg-6 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'students_id')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\backend\models\Students::find()->all(), 'id', 'fullName'),
                                'language' => 'ru',
                                'options' => ['placeholder' => 'Выберите Вид ...'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'multiple' => false,
                                    'disabled' => true
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'contract')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <div class="row row-lg">
            <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'type_edu_id', [
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
            <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'sum')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-lg">
            <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'type_contract_id', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->radioList(Yii::$app->params['type_contract'], [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $check = ($value == $checked) ? 'checked' : '';
                                $return = '<div class="radio-custom radio-primary radio-inline">';
                                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="' . $label . '" ' . $check . '>';
                                $return .= '<label for="' . $label . '">' . ucwords($label) . '</label>';
                                $return .= "</div>";

                                return $return;
                            }
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'phone1', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="formj" style="display: none">
            <div class="row row-lg">
                <div class="col-lg-6 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'fio')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'pass_seria')->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => 'aa',
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'pass_number')->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '9999999',
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-lg">
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'from')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'bring_date')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'work')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="formy" style="display: none">
            <div class="row row-lg">
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'title')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'license')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'director')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-lg">
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'bill')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'b')->textInput() ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'bux')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row row-lg">
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'inn')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">
                            <?= $form->field($model, 'okohx')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-9">

                            <?= $form->field($model, 'mfo')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg">

            <div class="col-lg-4 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'address')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'phone2')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'phone3')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+\9\9899-999-99-99',
                        ]) ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
$js = <<<JS
$(function() {
    $('input[type="radio"]').on('click', function() {
        if ($(this).val() == '1') {
            $('#formj').show();
        }
        else {
            $('#formj').hide();
        }
        if ($(this).val() == '2') {
            $('#formy').show();
        }
        else {
            $('#formy').hide();
        }
    });
    
});
JS;
$this->registerJs($js);
?>