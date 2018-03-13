<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reception */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Receptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page animsition">
<div class="page-content">
<div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Reception'), ['/reception'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="example-wrap">
                    <div class="example table-responsive">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'edu_center_id',
            'fio',
            'tel',
            'coming_id',
            'type_edu_id',
            'date_coming',
            'creater',
            'create_date',
            'update_date',
            'instance_id',
            'comment_id',
        ],
    ]) ?>

  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>