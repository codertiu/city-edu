<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Receptions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reception-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('main', 'Create Reception'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'edu_center_id',
            'fio',
            'tel',
            'coming_id',
            'createDate',
            //'type_edu_id',
            //'date_coming',
            //'creater',
            //'create_date',
            //'update_date',
            //'instance_id',
            //'comment_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
