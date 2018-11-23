<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

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
<div class="page">
    <div class="page-content">
        <div class="panel-body">

            <?php $form = ActiveForm::begin([
                'enableAjaxValidation' => false,
                'enableClientValidation' => true
            ]); ?>
            <div class="row row-lg">
                <div class="col-lg-4  form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'type_pay', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->widget(Select2::classname(), [
                                'data' => Yii::$app->params['type_pay'],
                                'language' => 'ru',
                                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'multiple' => false,
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'sum', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4  form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">

                            <?= $form->field($model, 'currency_id', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->widget(Select2::classname(), [
                                'data' => Yii::$app->params['currency'],
                                'language' => 'ru',
                                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'multiple' => false,
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-lg">
                <div class="col-lg-12 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">

                            <?= $form->field($model, 'date', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->widget(DatePicker::classname(), [
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
                <div class="col-lg-12 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
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
</div>
