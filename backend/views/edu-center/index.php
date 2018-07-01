<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EduCenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Edu Centers');
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
                            <?= Html::a(Yii::t('main', 'Create Edu Center'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <div class="example-wrap">
                            <div class="example table-responsive">

                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        'name',
                                        'address',
                                        'tel',
                                        'director',
                                        'active',
                                        'inn',
                                        'checking_account',
                                        'mfo',
                                        'oked',

                                        ['class' => 'yii\grid\ActionColumn',
                                            'template'=>'{update}'
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
