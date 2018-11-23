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

<div class="panel-body">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="row row-lg">
                <div class="col-lg-12 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'member_id', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\backend\models\Members::find()->where(['active' => 1])->all(), 'id', 'fio'),
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
                <div class="col-lg-7 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'type_pay', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->radioList(Yii::$app->params['type_pay'],
                                [
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
                <div class="col-lg-5 form-horizontal">
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
                <div class="col-lg-6 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'sum', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->textInput(['maxlength' => true]) ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 form-horizontal">
                    <div class="form-group">
                        <div class=" col-lg-12 col-sm-9">
                            <?= $form->field($model, 'currency_id', [
                                'template' => '{label} * {input}{error}{hint}'
                            ])->radioList(Yii::$app->params['currency'],
                                [
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
            </div>
        </div>
        <div class="col-md-6">
            <div class="row row-lg">
                <div class="col-lg-12 form-horizontal">
                    <div class="col-lg-12 col-sm-9">
                        <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group text-right">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

