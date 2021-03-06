<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Rooms');
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
                            <?= Html::a(Yii::t('main', 'Create Room'), ['create'], ['class' => 'btn btn-success']) ?>
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
                                            'attribute' => 'edu_center_id',
                                            'value' => 'eduCenter.name'
                                        ],
                                        'room',

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
