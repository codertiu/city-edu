<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Expense */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Expenses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-actions">
                    <div class="item-actions">
                            <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-arrow-left"></i>', ['/expense']) ?>
                            </span>
                        <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-edit" aria-hidden="true"></i>', ['update', 'id' => $model->id]) ?>
                            </span>
                        <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-delete" aria-hidden="true"></i>', ['delete', 'id' => $model->id], [
                                    'data' => [
                                        'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </span>
                    </div>
                </div>
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        <div class="example-wrap">
                            <div class="example table-responsive">

                                <?= DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        'id',
                                        'speciality',
                                        'exCategory.title',
                                        'date',
                                        'sum',
                                        'type_pay_id',

                                        'comment',
                                        //'create_date',
                                        //'update_date',
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