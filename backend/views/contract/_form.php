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

<div class="contract-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <? if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'students_id')->hiddenInput(['value' => $id])->label(false) ?>
    <? } else { ?>
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
    <?php } ?>
    <div class="row row-lg">
        <div class="col-lg-6 form-horizontal">
            <div class="form-group">
                <div class=" col-lg-12 col-sm-9">
                    <? if ($model->isNewRecord) { ?>
                        <?
                        $st = \backend\models\Students::findOne($id)->edu_center_id;
                        $st = $st < 10 ? "0$st" : $st;
                        $model->contract = $st . '/' . substr(date('Y'), 2, 2) . '/' . date('m'); ?>
                        <?= $form->field($model, 'contract', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '99/99/99/9999',
                        ]) ?>
                    <? } else { ?>
                        <?= $form->field($model, 'contract')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                    <?php } ?>
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
                <div class=" col-lg-12 col-sm-9">

                    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                        'language' => 'ru',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,
                            'orientation' => "bottom"
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
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
    </div>
    <div class="row row-lg">
        <div class="col-lg-6 form-horizontal">
            <div class="form-group">
                <div class="col-lg-12 col-sm-9">
                        <?=$form->field($model,'type_contract_id', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->radioList(Yii::$app->params['type_contract'])?>
                </div>
            </div>
        </div>
        <div class="col-lg-6 form-horizontal">
            <div class="form-group">
                <div class="col-lg-12 col-sm-9">
                    <?=$form->field($model,'phone1',[
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '+\9\9899-999-99-99',
                    ])?>
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
            <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'from')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 form-horizontal">
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
            <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'bill')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'b')->textInput() ?>
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
$js=<<<JS
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