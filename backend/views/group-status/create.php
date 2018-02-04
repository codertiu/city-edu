<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GroupStatus */

$this->title = Yii::t('main', 'Create Group Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Group Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
