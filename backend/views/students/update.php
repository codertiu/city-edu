<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */

$this->title = Yii::t('main', 'Update Students: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Yii::t('main', 'Students') ?>
                    <span class="panel-desc"><?= Yii::t('main', 'Created') ?></span>
                </h3>
            </div>
            <div class="panel-body">

                <?= $this->render('_update', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>

