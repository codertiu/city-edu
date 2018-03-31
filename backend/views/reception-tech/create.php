<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ReceptionTech */

$this->title = Yii::t('main', 'Create Reception Tech');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Reception Teches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reception-tech-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
