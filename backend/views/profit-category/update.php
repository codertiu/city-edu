<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfitCategory */

$this->title = Yii::t('main', 'Update Profit Category: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Profit Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="panel">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
