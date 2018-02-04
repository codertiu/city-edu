<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reception */

$this->title = Yii::t('main', 'Create Reception');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Receptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reception-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
