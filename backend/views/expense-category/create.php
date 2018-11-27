<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ExpenseCategory */

$this->title = Yii::t('main', 'Create Expense Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Expense Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
