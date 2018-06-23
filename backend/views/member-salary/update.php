<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MemberSalary */

$this->title = 'Update Member Salary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Member Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?>
            <span class="panel-desc"> </span>
        </h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
