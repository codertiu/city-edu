<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MemberSalary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Member Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-salary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'member_id',
            'sum',
            'type_pay',
            'currency_id',
            'date',
            'comment',

            'create_date',
            'update_date',
        ],
    ]) ?>

</div>
