<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GroupTech */

$this->title = Yii::t('main', 'Create Group Tech');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Group Teches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-tech-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
