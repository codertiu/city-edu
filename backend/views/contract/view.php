<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Contracts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?/* Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        <?php /*Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'students_id',
            'contract',
            'sum',
            'date',
            'type_edu_id',
        ],
    ]) ?>

</div>
