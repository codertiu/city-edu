<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FirstCancel */

$this->title = Yii::t('main', 'Create First Cancel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'First Cancels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="first-cancel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
