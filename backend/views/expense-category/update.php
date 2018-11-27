<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpenseCategory */

$this->title = Yii::t('main', 'Update Expense Category: ' . $model->title, [
    'nameAttribute' => '' . $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Expense Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="panel">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
