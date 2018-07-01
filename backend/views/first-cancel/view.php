<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FirstCancel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'First Cancels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="first-cancel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            'coming_id',
            'creator_id',
            'create_date',
            'update_date',
        ],
    ]) ?>

</div>
