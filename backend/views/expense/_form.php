<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Expense */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel-body">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>
    <div class="row row-lg">
        <div class="col-lg-4 form-horizontal">
            <div class="form-group">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'date', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(DatePicker::classname(), [
                        'language' => 'ru',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'options' => ['value' => date("Y-m-d")],
                        'pluginOptions' => [
                            'default' => date('Y-m-d'),
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,
                            'orientation' => "bottom"
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 form-horizontal">
            <div class="form-group">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'speciality', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 form-horizontal">
            <div class="form-group">
                <div class=" col-lg-12 col-sm-9">
                    <?= $form->field($model, 'expense_category_id', [
                        'template' => '{label} * {input}{error}{hint}'
                    ])->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\backend\models\ExpenseCategory::find()->where(['status' => 1])->all(), 'id', 'title'),
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
                    <?= $form->field($model, 'type_pay_id', [
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
    </div>
    <div class="row row-lg">
        <div class="col-lg-12  form-horizontal">
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
