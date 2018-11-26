<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EduCenter;
use kartik\select2\Select2;
use backend\models\Members;
use backend\models\GroupStatus;
use kartik\date\DatePicker;
use backend\models\Since;

/* @var $this yii\web\View */
/* @var $model backend\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true
    ]); ?>

    <div class="col-md-6">
        <div class="row row-lg">
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'edu_center_id', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
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
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'member_id', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Members::find()->where(['members_status' => 4])->all(), 'id', 'fio'),
                            'language' => 'ru',
                            'options' => ['placeholder' => Yii::t('main', 'Select')],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false,
                            ],
                        ])

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'group_status_id', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(GroupStatus::find()->all(), 'id', 'name'),
                            'language' => 'ru',
                            'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
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
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'name', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->textInput(['maxlength' => true]) ?>
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
            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'begin_date', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(DatePicker::classname(), [
                            'language' => 'ru',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'end_date', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(DatePicker::classname(), [
                            'language' => 'ru',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'since_id', [
                            'template' => '{label} * {input}{error}{hint}'
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Since::find()->all(), 'id', 'name'),
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
            <div class="col-lg-12 form-horizontal">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <?= $form->field($sub_student, 'students_id')->checkboxList($students, [
            'item' => function ($index, $label, $name, $checked, $value) {
                $check = ($value == $checked) ? 'checked' : '';
                $return = "<div class='checkbox-custom checkbox-primary'>";
                $return .= '<input type="checkbox" name="' . $name . '" value="' . $value . '" id="' . $label . '" ' . $check . '>';
                $return .= '<label for="' . $label . '">' . ucwords($label) . '</label>';
                $return .= "</div>";
                return $return;
            }
        ]) ?>
    </div>
    <div class="col-md-12">
        <div class="form-group text-right">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

