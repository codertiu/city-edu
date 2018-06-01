<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */

$this->title = 'Create Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'first' => $first,
        'model' => $model

    ]) ?>

</div>
