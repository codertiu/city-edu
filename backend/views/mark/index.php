<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MarkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mark-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mark', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'date',
            'mark_status',
            'mark',
            'member_id',
            'group_id',
            'dislike',
            'mark_type',
            'absent',
            //'students_id',
            //'comment',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
