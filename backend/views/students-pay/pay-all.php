<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;

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
<? $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
]) ?>
<div class="row row-lg">
    <div class="col-lg-6  form-horizontal">
        <div class="form-group form-material">
            <div class=" col-lg-12 col-sm-9">
                <?= $form->field($model, 'students_id', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\backend\models\Students::find()->where(['active' => Yii::$app->params['active'][1]])->where('id in(select students_id from Contract)')->all(), 'id', 'fullName'),
                    'language' => 'ru',
                    'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom', 'id' => 'cat-id'],
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
                <?= $form->field($model, 'contract_id', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->widget(DepDrop::classname(), [
                    'type' => DepDrop::TYPE_SELECT2,
                    'options' => ['id' => 'subcat-id'],
                    'pluginOptions' => [
                        'depends' => ['cat-id'],
                        'placeholder' => Yii::t('main', 'Select...'),
                        'url' => Url::to(['/students-pay/subcat'])
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
<div class="row row-lg">
    <div class="col-lg-12 form-horizontal">
        <div class="form-group form-material">
            <div class="col-lg-12 col-sm-9">
                <? if ($model->isNewRecord) { ?>
                    <?= $form->field($model, 'month')->checkboxList(Yii::$app->params['month'],
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $return = "<div class='checkbox-custom checkbox-primary checkbox-inline'>";
                                $return .= '<input type="checkbox" name="' . $name . '" value="' . $value . '" id="' . $label . '">';
                                $return .= '<label for="' . $label . '">' . ucwords($label) . '</label>';
                                $return .= "</div>";
                                return $return;
                            }
                        ]
                    ) ?>
                <? } else { ?>
                    <?= $form->field($model, 'for_month', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(Select2::classname(), [
                        'data' => Yii::$app->params['month'],
                        'language' => 'ru',
                        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'multiple' => false,
                        ],
                    ]); ?>
                <? } ?>
            </div>
        </div>
    </div>
</div>
<div class="row row-lg">
    <div class="col-lg-7 form-horizontal">
        <div class="form-group form-material">
            <div class="col-lg-12 col-sm-9">
                <?= $form->field($model, 'type_pay_id', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->radioList(Yii::$app->params['type_pay'], [
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
        <div class="form-group form-material">
            <div class="col-lg-12 col-sm-9">
                <?= $form->field($model, 'sum', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->textInput() ?>
            </div>
        </div>
    </div>

</div>

<div class="form-group text-right">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<? ActiveForm::end() ?>
