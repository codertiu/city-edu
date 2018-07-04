<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">

                        <h1><?= Html::encode($this->title) ?></h1>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <p>
                            <?= Html::a(Yii::t('main', 'Create Group'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                'eduCenter.name',
                                [
                                    'attribute' => 'name',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        return Html::a($model->name, ['/group/view', 'id' => $model->id]);
                                    },
                                ],
                                'member.fio',
                                'lavel',
                                //'begin_date',
                                //'end_date',
                                //'group_status_id',
                                //'comment:ntext',
                                //'since_id',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{view}{update}'
                                ],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
