<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\EduCenter;


/* @var $this yii\web\View */
/* @var $model backend\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']
]); ?>
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
                    ])->textInput(['maxlength' => true]) ?>

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
                        //'value'=>'2018-04-12',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,
                            'orientation' => "bottom"
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
                    <?= $form->field($model, 'tel', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '+\9\9899-999-99-99',
                    ]) ?>

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
        <div class="col-lg-6  form-horizontal">
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
        <div class="col-lg-6  form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'address', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->textarea(['rows' => 5]) ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row row-lg">
        <div class="col-lg-6 form-horizontal">
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
        <div class="col-lg-6 form-horizontal">
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
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'edu_center_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(EduCenter::find()->all(), 'id', 'name'),
                        'language' => 'ru',
                        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'multiple' => false,
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <?php
        $id = \backend\models\Members::find()->select('user_id')->where(['is not', 'user_id', null]);
        $st = \backend\models\Students::find()->select('user_id')->where(['is not', 'user_id', null]);
        $data = ArrayHelper::map(\common\models\User::find()->where(['not in', 'id', $st])->andWhere(['not in', 'id', $id])->andWhere(['!=', 'superadmin', 1])->all(), 'id', 'username');
        ?>
        <div class="col-lg-6 form-horizontal">
            <div class="form-group form-material">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
                        'data' => $data,
                        'language' => 'ru',
                        'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...'), 'orientation' => 'bottom'],
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

