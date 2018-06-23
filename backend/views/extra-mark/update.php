<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ExtraMark */

$this->title = Yii::t('main', 'Update Extra Mark: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Extra Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
