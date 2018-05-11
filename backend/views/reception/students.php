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
                                <?= Html::a('<i class="icon md-arrow-left"></i>', ['/reception/view', 'id'=>$reception->id]) ?>
                            </span>
                    </div>
                </div>
                <h3 class="panel-title"><?= $reception->name . " " . $reception->surname ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'options' => ['enctype' => 'multipart/form-data']
                ]); ?>
                <p><?=Yii::t('main','* belgi bor maydonlar to\'ldirilishi shart')?></p>
                <?= $form->field($model, 'reception_id')->hiddenInput(['value' => $reception->id])->label(false) ?>
                <div class="row row-lg">
                    <div class="col-lg-4  form-horizontal">
                        <div class="form-group form-material">
                            <div class=" col-lg-12 col-sm-9">
                                <?= $form->field($model, 'name', [
                                    'template' => '{label} * {input}{error}{hint}'
                                ])->textInput(['maxlength' => true, 'value' => $reception->name]) ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  form-horizontal">
                        <div class="form-group form-material">
                            <div class=" col-lg-12 col-sm-9">
                                <?= $form->field($model, 'surname', [
                                    'template' => '{label} * {input}{error}{hint}'
                                ])->textInput(['maxlength' => true, 'value' => $reception->surname]) ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  form-horizontal">
                        <div class="form-group form-material">
                            <div class=" col-lg-12 col-sm-9">
                                <?= $form->field($model, 'dob', [
                                    'template' => '{label} * {input}{error}{hint}'
                                ])->widget(DatePicker::classname(), [
                                    'language' => 'ru',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'options' => ['value' => $reception->dob],
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        //'todayHighlight' => true,
                                        'autoclose' => true,
                                    ],
                                ]); ?>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row row-lg">
                    <div class="col-lg-3  form-horizontal">
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
                    <div class="col-lg-3  form-horizontal">
                        <div class="form-group form-material">
                            <div class=" col-lg-12 col-sm-9">
                                <?php $model->phone2 = $reception->phone2 ?>
                                <?= $form->field($model, 'phone2')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => '+\9\9899-999-99-99',
                                ]) ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  form-horizontal">
                        <div class="form-group form-material">
                            <div class=" col-lg-12 col-sm-9">
                                <?php $model->phone3 = $reception->phone3 ?>
                                <?= $form->field($model, 'phone3')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => '+\9\9899-999-99-99',
                                ]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  form-horizontal">
                        <div class="form-group form-material">
                            <div class=" col-lg-12 col-sm-9">
                                <?php $model->phone4 = $reception->phone4 ?>
                                <?= $form->field($model, 'phone4')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => '+\9\9899-999-99-99',
                                ]) ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-lg">
                    <div class="col-lg-4  form-horizontal">
                        <div class="form-group form-material">
                            <div class=" col-lg-12 col-sm-9">
                                <?= $form->field($model, 'gendar', [
                                    'template' => '{label} * {input}{error}{hint}'
                                ])->radioList(Yii::$app->params['gender']) ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  form-horizontal">
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
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-lg">
                    <div class="col-lg-4  form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-9">
                                <div class="input-group input-group-file">
                                    <?= $form->field($model, 'image', [
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->fileInput(['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  form-horizontal">
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
                    <div class="col-lg-4  form-horizontal">
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
                    <div class="col-lg-3  form-horizontal">
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
                    <div class="col-lg-3  form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-9">
                                <div class="input-group input-group-file">
                                    <?= $form->field($students_info, 'lavel', [
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->widget(Select2::classname(), [
                                        'data' => Yii::$app->params['lavel'],
                                        'language' => 'ru',
                                        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'value' => $reception->lavel],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'multiple' => false,
                                        ],
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-9">
                                <div class="input-group input-group-file">
                                    <?php $students_info->study_type = $reception->study_type ?>
                                    <?= $form->field($students_info, 'study_type', [
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->radioList(
                                        \Yii::$app->params['study_type']
                                    ) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3  form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-9">
                                <div class="input-group input-group-file">
                                    <?php $students_info->language = $reception->language ?>
                                    <?= $form->field($students_info, 'language', [
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->radioList(
                                        Yii::$app->params['language']
                                    ) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-lg">
                    <div class="col-lg-3  form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12 col-sm-9">
                                <div class="input-group input-group-file">
                                    <?php $students_info->comfortable_time = $reception->comfortable_time ?>
                                    <?= $form->field($students_info, 'comfortable_time', [
                                        'template' => '{label} * {input}{error}{hint}'
                                    ])->radioList(Yii::$app->params['comfortable_time']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  form-horizontal">
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
                    <div class="col-lg-6  form-horizontal">
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
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
