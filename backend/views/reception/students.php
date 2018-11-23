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
/* @var $model backend\models\Students */
/* @var $form yii\widgets\ActiveForm */
//$css = <<<CSS
//.datepicker {
//      z-index: 9999 !important; /* has to be larger than 1050 */
//    }
//.select2-dropdown {
//  z-index: 10060 !important;/*1051;*/
//}
//CSS;
//$this->registerCss($css);
//
//\kartik\select2\Select2Asset::register($this);
$this->title = Yii::t('main', 'Students Reg');
?>
    <div class="page">
        <div class="page-content">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-actions">
                        <div class="item-actions">
                            <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-arrow-left"></i>', ['/reception/view', 'id' => $reception->id]) ?>
                            </span>
                        </div>
                    </div>
                    <h3 class="panel-title"><?= $reception->name ?></h3>
                </div>
                <div class="panel-body container-fluid">
                    <?php $form = ActiveForm::begin([
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => true,
                        'options' => ['enctype' => 'multipart/form-data']
                    ]); ?>
                    <p><?= Yii::t('main', '* belgi bor maydonlar to\'ldirilishi shart') ?></p>
                    <?= $form->field($model, 'reception_id')->hiddenInput(['value' => $reception->id])->label(false) ?>
                    <div class="col-md-4">
                        <div class="col-lg-12 form-horizontal">
                            <div class="form-group text-center">
                                <img id="img">
                            </div>
                            <div class="form-group text-center">
                                <div class="col-lg-12 col-sm-9">
                                    <div class="input-group input-group-file">
                                        <?= $form->field($model, 'image', [
                                            'template' => '{label} * {input}{error}{hint}'
                                        ])->fileInput(['class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row row-lg">
                            <div class="col-lg-6 form-horizontal">
                                <div class="form-group form-material">
                                    <div class=" col-lg-12 col-sm-9">
                                        <?= $form->field($model, 'name', [
                                            'template' => '{label} * {input}{error}{hint}'
                                        ])->textInput(['maxlength' => true, 'value' => $reception->name]) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 form-horizontal">
                                <div class="form-group form-material">
                                    <div class=" col-lg-12 col-sm-9">
                                        <?= $form->field($model, 'dob', [
                                            'template' => '{label} * {input}{error}{hint}'
                                        ])->widget(DatePicker::classname(), [
                                            'language' => 'ru',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'orientation' => "bottom",
                                                'format' => 'yyyy-mm-dd',
                                                //'todayHighlight' => true,
                                                'autoclose' => true,
                                            ]
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-lg">
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group form-material">
                                    <div class=" col-lg-12 col-sm-9">
                                        <?php $model->tel = $reception->tel ?>
                                        <?= $form->field($model, 'tel', [
                                            'template' => '{label} * {input}{error}{hint}'
                                        ])->widget(\yii\widgets\MaskedInput::className(), [
                                            'mask' => '+\9\9899-999-99-99',
                                        ])
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group form-material">
                                    <div class=" col-lg-12 col-sm-9">
                                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-lg">
                            <div class="col-lg-8  form-horizontal">
                                <div class="form-group form-material">
                                    <div class=" col-lg-12 col-sm-9">
                                        <?= $form->field($model, 'address', [
                                            'template' => '{label} * {input}{error}{hint}'
                                        ])->textarea(['rows' => 5]) ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  form-horizontal">
                                <div class="form-group form-material">
                                    <div class=" col-lg-12 col-sm-9">
                                        <?= $form->field($model, 'gendar', [
                                            'template' => '{label} * {input}{error}{hint}'
                                        ])->radioList(Yii::$app->params['gender'],
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

                        <div class="row row-lg">
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group">
                                    <div class=" col-lg-12 col-sm-9">
                                        <div class="input-group input-group-file">
                                            <?= $form->field($model, 'pass_file', [
                                                'template' => '{label} * {input}{error}{hint}'
                                            ])->fileInput(['class' => 'form-control']); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group">
                                    <div class=" col-lg-12 col-sm-9">
                                        <div class="input-group input-group-file">
                                            <?= $form->field($model, 'file')->fileInput(['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-lg">
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group">
                                    <div class=" col-lg-12 col-sm-9">
                                        <div class="input-group input-group-file">

                                            <?= $form->field($students_info, 'type_edu_id', [
                                                'template' => '{label} * {input}{error}{hint}'
                                            ])->widget(Select2::classname(), [
                                                'data' => ArrayHelper::map(TypeEdu::find()->all(), 'id', 'name'),
                                                'language' => 'ru',
                                                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'value' => $reception->type_edu_id],
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                    'multiple' => false,
                                                ],
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-9">
                                        <div class="input-group input-group-file">
                                            <?= $form->field($students_info, 'lavel', [
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
                        </div>

                        <div class="row row-lg">
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-9">
                                        <div class="input-group input-group-file">
                                            <?php $students_info->study_type = $reception->study_type ?>
                                            <?= $form->field($students_info, 'study_type', [
                                                'template' => '{label} * {input}{error}{hint}'
                                            ])->radioList(
                                                \Yii::$app->params['study_type'],
                                                [
                                                    'item' => function ($index, $label, $name, $checked, $value) {
                                                        $check = ($value == $checked) ? 'checked' : '';
                                                        $return = '<div class="radio-custom radio-primary radio-inline">';
                                                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="' . $label . '" ' . $check . '>';
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
                            <div class="col-lg-6  form-horizontal">
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-9">
                                        <div class="input-group input-group-file">
                                            <?php $students_info->language = $reception->language ?>
                                            <?= $form->field($students_info, 'language', [
                                                'template' => '{label} * {input}{error}{hint}'
                                            ])->radioList(
                                                Yii::$app->params['language'],
                                                [
                                                    'item' => function ($index, $label, $name, $checked, $value) {
                                                        $check = ($value == $checked) ? 'checked' : '';
                                                        $return = '<div class="radio-custom radio-primary radio-inline">';
                                                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="' . $label . '" ' . $check . '>';
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
                        </div>

                        <div class="row row-lg">
                            <div class="col-lg-4  form-horizontal">
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-9">
                                        <div class="input-group">
                                            <?php $students_info->comfortable_time = $reception->comfortable_time ?>
                                            <?= $form->field($students_info, 'comfortable_time', [
                                                'template' => '{label} * {input}{error}{hint}'
                                            ])->radioList(Yii::$app->params['comfortable_time'],
                                                [
                                                    'item' => function ($index, $label, $name, $checked, $value) {
                                                        $check = ($value == $checked) ? 'checked' : '';
                                                        $return = '<div class="radio-custom radio-primary">';
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
                            <div class="col-lg-4  form-horizontal">
                                <div class="form-group form-material">
                                    <div class="col-lg-12 col-sm-9">
                                        <div class="input-group input-group-file">
                                            <?php $students_info->time = $reception->time ?>
                                            <?= $form->field($students_info, 'time', [
                                                'template' => '{label} * {input}{error}{hint}'
                                            ])->widget(\yii\widgets\MaskedInput::className(), [
                                                'mask' => '99:99 from 99:99 to',
                                            ])
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  form-horizontal">
                                <div class="form-group form-material">
                                    <div class="col-lg-12 col-sm-8">
                                        <?= $form->field($model, 'edu_center_id')->widget(Select2::classname(), [
                                            'data' => ArrayHelper::map(EduCenter::find()->all(), 'id', 'name'),
                                            'language' => 'ru',
                                            'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom', 'value' => $reception->edu_center_id],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                                'multiple' => false,
                                            ],
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>

<?php
$js = <<<JS
    $('#students-image').change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
                $('#img').attr('width', '150px').attr('height','200px');
                $('#img').addClass('img-rounded img-bordered img-bordered-primary');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
JS;
$css = <<<CSS
    input[type=file] {
       font-size: 16px;
       border: 1px solid black;
       border-radius: 15px 15px 15px 15px !important;
    }
CSS;
$this->registerCss($css);
$this->registerJs($js);
?>