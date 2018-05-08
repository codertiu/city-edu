<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\EduCenter;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */
/* @var $form yii\widgets\ActiveForm */
$css=<<<CSS
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


<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']
]); ?>
<?= $form->field($model, 'reception_id')->hiddenInput(['value'=>$reception->id])->label(false) ?>
<div class="row row-lg">
    <div class="col-lg-4  form-horizontal">
        <div class="form-group form-material">
            <div class=" col-lg-12 col-sm-9">
                <?= $form->field($model, 'name', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->textInput(['maxlength' => true,'value'=>$reception->name]) ?>

            </div>
        </div>
    </div>
    <div class="col-lg-4  form-horizontal">
        <div class="form-group form-material">
            <div class=" col-lg-12 col-sm-9">
                <?= $form->field($model, 'surname', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->textInput(['maxlength' => true,'value'=>$reception->surname]) ?>

            </div>
        </div>
    </div>
    <div class="col-lg-4  form-horizontal">
        <div class="form-group form-material">
            <div class=" col-lg-12 col-sm-9">
                <?= $form->field($model, 'dob', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->widget(DatePicker::classname(), [
                    'value'=>date('yyyy-mm-dd',strtotime($reception->dob)),
                    'language' => 'ru',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        //'todayHighlight' => true,
                        'autoclose'=>true,

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
                <?= $form->field($model, 'tel', [
                    'template' => '{label} * {input}{error}{hint}'
                ])->textInput(['value'=>$reception->tel,'placeholder'=>'+99890-999-99-99']) ?>

            </div>
        </div>
    </div>
    <div class="col-lg-3  form-horizontal">
        <div class="form-group form-material">
            <div class=" col-lg-12 col-sm-9">
                <?= $form->field($model, 'phone2')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '+\9\9899-999-99-99',
                ]) ?>

            </div>
        </div>
    </div>
    <div class="col-lg-3  form-horizontal">
        <div class="form-group form-material">
            <div class=" col-lg-12 col-sm-9">


                <?= $form->field($model, 'phone3')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '+\9\9899-999-99-99',
                ]) ?>

            </div>
        </div>
    </div>
    <div class="col-lg-3  form-horizontal">
        <div class="form-group form-material">
            <div class=" col-lg-12 col-sm-9">

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
    <div class="col-lg-12  form-horizontal">
        <div class="form-group form-material">
            <div class="col-lg-12 col-sm-8">
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
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


