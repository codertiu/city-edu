<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Group */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-actions">
                    <div class="item-actions">
                            <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-arrow-left"></i>', ['/group']) ?>
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
                <div class="col-lg-12">
                    <!-- Example Tabs Line Left With JS -->
                    <div class="example-wrap">
                        <div class="nav-tabs-vertical">
                            <ul class="nav nav-tabs nav-tabs-line margin-right-25" data-plugin="nav-tabs" role="tablist"
                                style="height: 228px;">
                                <li class="active" role="presentation"><a data-toggle="tab"
                                                                          href="#exampleTabsLineLeftOne"
                                                                          aria-controls="exampleTabsLineLeftOne"
                                                                          role="tab"
                                                                          aria-expanded="true"><?= Yii::t('main', 'Group') ?></a>
                                </li>
                                <li role="presentation" class=""><a data-toggle="tab" href="#exampleTabsLineLeftTwo"
                                                                    aria-controls="exampleTabsLineLeftTwo" role="tab"
                                                                    aria-expanded="false"><?= Yii::t('main', 'Students') ?></a>
                                </li>
                                <li role="presentation" class=""><a data-toggle="tab" href="#exampleTabsLineLeftThree"
                                                                    aria-controls="exampleTabsLineLeftThree" role="tab"
                                                                    aria-expanded="false"><?= Yii::t('main', 'Teachers') ?></a>
                                </li>
                                <li class="nav-tabs-autoline"
                                    style="transition-duration: 0.5s, 1s; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1), cubic-bezier(0.4, 0, 0.2, 1); top: 0px; height: 43px;"></li>
                            </ul>
                            <div class="tab-content padding-vertical-15" style="height: 228px;">
                                <div class="tab-pane active" id="exampleTabsLineLeftOne" role="tabpanel">
                                    <div class="row row-lg">
                                        <div class="col-md-12">
                                            <div class="example-wrap">
                                                <div class="example table-responsive">

                                                    <p>
                                                        <?= Html::a(Yii::t('main', 'Add Students'), ['/sub-students/add-students', 'group' => $model->id], ['class' => 'btn btn-success']) ?>
                                                    </p>
                                                    <?= DetailView::widget([
                                                        'model' => $model,
                                                        'attributes' => [
                                                            'id',
                                                            'eduCenter.name',
                                                            'name',
                                                            'member.fio',
                                                            [
                                                                'attribute' => 'begin_date',
                                                                'value' => function ($model) {
                                                                    return date('d/M/Y', strtotime($model->begin_date));
                                                                }
                                                            ],
                                                            [
                                                                'attribute' => 'end_date',
                                                                'value' => function ($model) {
                                                                    return date('d/M/Y', strtotime($model->end_date));
                                                                }
                                                            ],

                                                            'groupStatus.name',
                                                            'comment:ntext',
                                                            'since.name',
                                                        ],
                                                    ]) ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="exampleTabsLineLeftTwo" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="example-title"><?= Yii::t('main', 'Students') ?></h4>
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td><?= Yii::t('main', 'Students') ?></td>
                                                    <td><?= Yii::t('main', 'Action') ?></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?
                                                $i = 1;
                                                $students = \backend\models\SubStudents::find()->where(['group_id' => $model->id])->all();
                                                foreach ($students as $one) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td>
                                                            <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->students->id]) ?>"
                                                               target="_blank"><?= $one->students->fullName ?></a></td>
                                                        <td>
                                                            <?= Html::button(' <i class="icon md-edit"></i>', ['value' => yii\helpers\Url::to(['/sub-students/update', 'id' => $one->id]), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton waves-effect waves-classic']) ?>

                                                            <?= Html::a('<i class="icon md-delete" aria-hidden="true"></i>', ['delete-sub', 'id' => $one->students_id, 'group' => $model->id], [
                                                                'data' => [
                                                                    'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                                                                    'method' => 'post',
                                                                ],
                                                            ]) ?>
                                                        </td>
                                                    </tr>
                                                    <? $i++;
                                                } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="exampleTabsLineLeftThree" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="example-title"><?= Yii::t('main', 'Members') ?></h4>
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td><?= Yii::t('main', 'Members') ?></td>
                                                    <td><?= Yii::t('main', 'Type Of Study') ?></td>
                                                    <td><?= Yii::t('main', 'Action') ?></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?
                                                $i = 1;
                                                $teachers = \backend\models\GroupTech::find()->where(['group_id' => $model->id])->all();
                                                foreach ($teachers as $one) {
                                                    ?>
                                                    <tr class="<?= $one->status == 1 ? 'active' : 'danger' ?>">
                                                        <td><?= $i ?></td>
                                                        <td>
                                                            <a href="<?= \yii\helpers\Url::to(['/members/view', 'id' => $one->members->id]) ?>"
                                                               target="_blank"><?= $one->members->fio ?></a>
                                                            </td>
                                                        <td>
                                                            <?= Yii::$app->params['type_of_study'][$one->type_of_studay] ?>
                                                        </td>
                                                        <td>

                                                            <? if ($one->status == 1) { ?>
                                                                <?= Html::button(' <i class="icon md-edit"></i>', ['value' => yii\helpers\Url::to(['/group-tech/update', 'id' => $one->id]), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton waves-effect waves-classic']) ?>
                                                            <? } ?>
                                                        </td>
                                                    </tr>
                                                    <? $i++;
                                                } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Example Tabs Line Left -->
                </div>
            </div>
        </div>
    </div>

<?php
Modal::begin([
    'options' => [
        //'id'=>'kartik-modal',
        //'tabindex' => false,
    ],
    'header' => Yii::t('main', 'Modal'),
    'id' => 'modal',
    'size' => 'modal-lg'
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
<?php
$js = <<<JS
    $(function(){
        $('.modalButton').click(function(){
            $('#modal').modal('show')
              .find('#modalContent')
              .load($(this).attr('value'));
        });
    });
JS;
$this->registerJs($js);
?>