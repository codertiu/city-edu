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
                            'rowOptions' => function ($model) {
                                switch ($model->group_status_id) {
                                    case 1:
                                        return ['class' => 'active'];
                                        break;
                                    case 2:
                                        return ['class' => 'danger'];
                                        break;
                                }
                            },
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                [
                                    'attribute' => 'edu_center_id',
                                    'value' => 'eduCenter.name',
                                    'format' => 'raw',
                                    'filter' => kartik\select2\Select2::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'edu_center_id',
                                        'data' => yii\helpers\ArrayHelper::map(\backend\models\EduCenter::find()->all(), 'id', 'name'),
                                        'theme' => kartik\select2\Select2::THEME_BOOTSTRAP,
                                        'hideSearch' => true,
                                        'options' => [
                                            'placeholder' => Yii::t('main', 'Select'),
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]),
                                ],
                                [
                                    'attribute' => 'name',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        return Html::a($model->name, ['/group/view', 'id' => $model->id]);
                                    },
                                ],
                                //'member.fio',
                                //'lavel',
                                //'begin_date',
                                //'end_date',
                                [
                                    'attribute' => 'group_status_id',
                                    'value' => 'groupStatus.name',
                                    'format' => 'raw',
                                    'filter' => kartik\select2\Select2::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'group_status_id',
                                        'data' => yii\helpers\ArrayHelper::map(\backend\models\GroupStatus::find()->all(), 'id', 'name'),
                                        'theme' => kartik\select2\Select2::THEME_BOOTSTRAP,
                                        'hideSearch' => true,
                                        'options' => [
                                            'placeholder' => Yii::t('main', 'Select'),
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]),
                                ],
                                //'comment:ntext',
                                //'since_id',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{view}{update}'
                                ],
                            ],
                            'tableOptions' => ['class' => 'table table-hover'],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
