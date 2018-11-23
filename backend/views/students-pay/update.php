<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentsPay */

$this->title = Yii::t('main', 'Update Students Pay: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Students Pays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Yii::t('main', 'Student') ?>
                    <span class="panel-desc"><?= Yii::t('main', 'Pay') ?></span>
                </h3>
            </div>
            <div class="panel-body">

                <?= $this->render('_form', [
                    'model' => $model,
                    'id' => $id
                ]) ?>

            </div>
        </div>
    </div>
</div>

