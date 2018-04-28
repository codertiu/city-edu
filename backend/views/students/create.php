<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Students */

$this->title = Yii::t('main', 'Create Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Yii::t('main', 'Students') ?>
            <span class="panel-desc"><?= Yii::t('main', 'Created') ?></span>
        </h3>
    </div>
    <div class="panel-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>

