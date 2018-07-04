<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Student Messages');
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

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'rowOptions' => function ($model) {
                                if ($model->status == 1) {
                                    return ['class' => 'danger'];
                                } else if ($model->status == 2) {
                                    return ['class' => 'warning'];
                                } else {
                                    return ['class' => 'info'];
                                }
                            },
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                [
                                    'attribute' => 'student_id',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        return Html::a($model->student->fullName, ['/student-message/view', 'id' => $model->id]);
                                    }
                                ],
                                'create_date',
                                [
                                    'attribute' => 'type_message',
                                    'value' => function ($model) {
                                        if ($model->type_message == 1) {
                                            return Yii::t('main', 'ariza');
                                        } else {
                                            return Yii::t('main', 'taklif');
                                        }
                                    }
                                ],

                                'content:ntext',
                                //'status',
                                'answer:ntext',
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
