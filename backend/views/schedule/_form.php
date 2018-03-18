<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EduCenter;
use kartik\select2\Select2;
use backend\models\Group;
use backend\models\Room;
use kartik\time\TimePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
$day_id = [
    '1' => 'Dushanba',
    '2' => 'Seshanba',
    '3' => 'Chorshanba',
    '4' => 'Payshanba',
    '5' => 'Juma',
    '6' => 'Shanba',
    '7' => 'Yakshanba',
];
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=Yii::t('main','Schedule')?>
            <span class="panel-desc"><?=Yii::t('main','Created')?></span>
        </h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ]); ?>
        <div class="row row-lg">
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'edu_center_id')->widget(Select2::classname(), [
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
                        <?= $form->field($model, 'group_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Group::find()->all(), 'id', 'name'),
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
                        <?= $form->field($model, 'day_id')->dropDownList($day_id,
                            ['prompt' => 'Hafta kunlari ...']);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'begin_time')->widget(TimePicker::className(),
                            [
                                'readonly' => true,
                                'pluginOptions' => [
                                    'showSeconds' => false,
                                    'showMeridian' => false,
                                    'minuteStep' => 1,
                                    'secondStep' => 5,
                                ],
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ]); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'end_time')->widget(TimePicker::className(),
                            [
                                'readonly' => true,
                                'pluginOptions' => [
                                    'showSeconds' => false,
                                    'showMeridian' => false,
                                    'minuteStep' => 1,
                                    'secondStep' => 5,
                                ],
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ]); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  form-horizontal">
                <div class="form-group form-material">
                    <div class=" col-lg-12 col-sm-9">
                        <?= $form->field($model, 'room_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Room::find()->all(), 'id', 'room'),
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
        </div>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
