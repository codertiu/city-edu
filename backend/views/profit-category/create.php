<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ProfitCategory */

$this->title = Yii::t('main', 'Create Profit Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Profit Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
