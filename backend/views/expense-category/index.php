<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpenseCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Expense Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <?php Pjax::begin(); ?>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <p>
                            <?= Html::a(Yii::t('main', 'Create Expense Category'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                'title',
                                'status',
                                //'create_date',
                                //'update_date',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
