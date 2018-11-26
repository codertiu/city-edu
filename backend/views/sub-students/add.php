<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('main','Add Students');

?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">

                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'students_id')->checkboxList($students, [
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
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $first->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>

                </div>
                <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
</div>