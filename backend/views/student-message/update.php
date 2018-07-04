<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentMessage */

$this->title = Yii::t('main', 'Update Student Message: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Student Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Yii::t('main', 'Student Message') ?>
            <span class="panel-desc"><?= Yii::t('main', 'Answer') ?></span>
        </h3>
    </div>
    <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
