<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Members */

$this->title = Yii::t('main', 'Update Members: {nameAttribute}', [
    'nameAttribute' => $model->fio,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
