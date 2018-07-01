<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Members');
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
                            <?= Html::a(Yii::t('main', 'Create Members'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <div class="example-wrap">
                            <div class="example table-responsive">

                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        [
                                            'attribute' => 'fio',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->fio, ['/members/view', 'id' => $model->id]);
                                            },
                                        ],
                                        [
                                            'attribute' => 'tel',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->tel, ['/members/view', 'id' => $model->id]);
                                            },
                                        ],
                                        [
                                            'attribute' => 'address',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->address, ['/members/view', 'id' => $model->id]);
                                            },
                                        ],
//                                        [
//                                            'attribute' => 'about:ntext',
//                                            'format' => 'raw',
//                                            'value' => function ($model) {
//                                                return Html::a($model->fio, ['/members/view', 'id' => $model->id]);
//                                            },
//                                        ],
                                        //'gendar',
                                        //'edu_center_id',
                                        //'active',
                                        //'img',
                                        //'file',

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
    </div>
</div>
