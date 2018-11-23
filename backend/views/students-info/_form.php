<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\EduCenter;
use backend\models\Comment;
use backend\models\Instance;
use backend\models\TypeEdu;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsInfo */
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
    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'students_id')->hiddenInput(['value' => $id])->label(false) ?>
    <?php } else { ?>
        <?= $form->field($model, 'students_id')->hiddenInput()->label(false) ?>
    <?php } ?>
    <div class="row row-lg">
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'language', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->radioList(
                        Yii::$app->params['language'], [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $check = ($value==$checked)?'checked':'';
                                $return = '<div class="radio-custom radio-primary radio-inline">';
                                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="' . $label . '" '.$check.'>';
                                $return .= '<label for="' . $label . '">' . ucwords($label) . '</label>';
                                $return .= "</div>";

                                return $return;
                            }
                        ]
                    ) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'study_type', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->radioList(
                        \Yii::$app->params['study_type'], [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $check = ($value==$checked)?'checked':'';
                                $return = '<div class="radio-custom radio-primary radio-inline">';
                                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="' . $label . '" '.$check.'>';
                                $return .= '<label for="' . $label . '">' . ucwords($label) . '</label>';
                                $return .= "</div>";

                                return $return;
                            }
                        ]
                    ) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-lg">
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'type_edu_id', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(TypeEdu::find()->all(), 'id', 'name'),
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
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'lavel', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(Select2::classname(), [
                        'data' => Yii::$app->params['lavel'],
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
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'comfortable_time', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->radioList(Yii::$app->params['comfortable_time'], [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            $check = ($value==$checked)?'checked':'';
                            $return = '<div class="radio-custom radio-primary">';
                            $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="' . $label . '" '.$check.'>';
                            $return .= '<label for="' . $label . '">' . ucwords($label) . '</label>';
                            $return .= "</div>";

                            return $return;
                        }
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'time', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '99:99 from 99:99 to',
                    ])
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
