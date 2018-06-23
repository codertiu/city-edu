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
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?>
            <span class="panel-desc"> </span>
        </h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
