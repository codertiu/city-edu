<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Contract;

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
                            <!--<span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-delete" aria-hidden="true"></i>', ['delete', 'id' => $model->id], [
                                    'data' => [
                                        'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </span>-->
                        </div>
                    </div>
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="col-lg-12">
                        <!-- Example Tabs Line Left With JS -->
                        <div class="example-wrap">
                            <div class="nav-tabs-vertical">
                                <ul class="nav nav-tabs nav-tabs-line margin-right-25" data-plugin="nav-tabs"
                                    role="tablist"
                                    style="height: 228px;">
                                    <li class="active" role="presentation"><a data-toggle="tab"
                                                                              href="#exampleTabsLineLeftOne"
                                                                              aria-controls="exampleTabsLineLeftOne"
                                                                              role="tab"
                                                                              aria-expanded="true"><?= Yii::t('main', 'Group') ?></a>
                                    </li>
                                    <li role="presentation" class=""><a data-toggle="tab" href="#exampleTabsLineLeftTwo"
                                                                        aria-controls="exampleTabsLineLeftTwo"
                                                                        role="tab"
                                                                        aria-expanded="false"><?= Yii::t('main', 'Students') ?></a>
                                    </li>
                                    <li role="presentation" class=""><a data-toggle="tab"
                                                                        href="#exampleTabsLineLeftThree"
                                                                        aria-controls="exampleTabsLineLeftThree"
                                                                        role="tab"
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!--<? $contract = new \backend\models\Contract(); ?>
                                                        <div class="row">
                                                            <? $form = \yii\widgets\ActiveForm::begin([
                                                            'action' => ['sub-students/insert'],
                                                            'method' => 'post']) ?>
                                                            <?= $form->field($contract, 'fio')->hiddenInput(['value' => $model->id])->label(false) ?>

                                                            <div class="col-md-6">
                                                                <? // TODO select boshidan yozish kerak sub_students table da bor student chiqmasligi kerak ?>
                                                                <?= $form->field($contract, 'contract')->widget(Select2::classname(), [
                                                            'data' => ArrayHelper::map(Contract::find()->where('students_id in (select id from students where active=1) and students_id not in (select students_id from sub_students where group_id=' . $model->id . ')')->all(), 'id', 'contract'),
                                                            'language' => 'ru',
                                                            'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                                                            'pluginOptions' => [
                                                                'allowClear' => true,
                                                                'multiple' => false,
                                                            ],
                                                        ])->label(false); ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?= Html::submitButton(Yii::t('main', 'save'), ['class' => 'btn btn-success']) ?>
                                                            </div>
                                                            <? $form->end() ?>
                                                        </div>-->
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <p>
                                                            <?= Html::a('<i class="icon md-plus" aria-hidden="true"></i>', ['/sub-students/add', 'group' => $model->id], ['class' => 'btn btn-success']) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?= Yii::t('main', 'Contract') ?></td>
                                                        <td><?= Yii::t('main', 'Students') ?></td>
                                                        <td><?= Yii::t('main', 'Begin Date') ?></td>
                                                        <td><?= Yii::t('main', 'Action') ?></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?
                                                    $i = 1;
                                                    $students = \backend\models\SubStudents::find()->where(['group_id' => $model->id])->all();
                                                    foreach ($students as $one) {
                                                        ?>
                                                        <tr class="active">
                                                            <td><?= $i ?></td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->students->id]) ?>"
                                                                   target="_blank"><?= $one->students->contract->contract ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->students->id]) ?>"
                                                                   target="_blank"><?= $one->students->fullName ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->students->id]) ?>"
                                                                   target="_blank"><?= $one->begin_date ?></a>
                                                            </td>
                                                            <td>
                                                                <?= Html::button(' <i class="icon md-share"></i>', ['value' => yii\helpers\Url::to(['/group/change', 'id' => $one->students_id, 'group' => $model->id]), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton waves-effect waves-classic']) ?>

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
                                            <div class="col-md-12">
                                                <h4 class="example-title"><?= Yii::t('main', 'Students History') ?></h4>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?= Yii::t('main', 'Contract') ?></td>
                                                        <td><?= Yii::t('main', 'Students') ?></td>
                                                        <td><?= Yii::t('main', 'Begin Date') ?></td>
                                                        <td><?= Yii::t('main', 'End Date') ?></td>
                                                        <td><?= Yii::t('main', 'To Group Id') ?></td>
                                                        <td><?= Yii::t('main', 'Comment') ?></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?
                                                    $i = 1;
                                                    $students = \backend\models\HSubStudent::find()->where(['group_id' => $model->id])->all();
                                                    foreach ($students as $one) {
                                                        ?>
                                                        <tr class="danger">
                                                            <td><?= $i ?></td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->student->id]) ?>"
                                                                   target="_blank"><?= $one->student->contract->contract ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->student->id]) ?>"
                                                                   target="_blank"><?= $one->student->fullName ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->student->id]) ?>"
                                                                   target="_blank"><?= $one->begin_date ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->student->id]) ?>"
                                                                   target="_blank"><?= $one->date ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->student->id]) ?>"
                                                                   target="_blank"><?= $one->to_group_id == 0 ? Yii::t('main', 'Delete') : $one->to_group_id ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/students/view', 'id' => $one->student->id]) ?>"
                                                                   target="_blank"><?= $one->comment ?></a>
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
                                                <h4 class="example-title"><?= Yii::t('main', 'Teachers') ?></h4>
                                                <div class="col-md-12">
                                                    <? $teach = new \backend\models\GroupTech(); ?>
                                                    <div class="row">
                                                        <? $form = \yii\widgets\ActiveForm::begin([
                                                            'action' => ['group-tech/insert'],
                                                            'method' => 'post']) ?>
                                                        <div class="col-md-3">
                                                            <?= $form->field($teach, 'teacher_id')->widget(Select2::classname(), [
                                                                'data' => ArrayHelper::map(\backend\models\Members::find()->where('active=1 and members_status=4')->all(), 'id', 'fio'),
                                                                'language' => 'ru',
                                                                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                                                                'pluginOptions' => [
                                                                    'allowClear' => true,
                                                                    'multiple' => false,
                                                                ],
                                                            ]) ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?= $form->field($teach, 'type_of_studay')->widget(Select2::classname(), [
                                                                'data' => Yii::$app->params['type_of_study'],
                                                                'language' => 'ru',
                                                                'options' => ['placeholder' => Yii::t('main', 'Выберите Вид ...')],
                                                                'pluginOptions' => [
                                                                    'allowClear' => true,
                                                                    'multiple' => false,
                                                                ],
                                                            ]) ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= $form->field($teach, 'group_id')->hiddenInput(['value' => $model->id])->label(false) ?>
                                                            <?= Html::submitButton(Yii::t('main', 'save'), ['class' => 'btn btn-success']) ?>
                                                        </div>
                                                        <? $form->end() ?>
                                                    </div>
                                                </div>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?= Yii::t('main', 'Members') ?></td>
                                                        <td><?= Yii::t('main', 'Type Of Study') ?></td>
                                                        <td><?= Yii::t('main', 'Begin date') ?></td>
                                                        <td><?= Yii::t('main', 'Action') ?></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?
                                                    $i = 1;
                                                    $teachers = \backend\models\GroupTech::find()->where(['group_id' => $model->id])->all();
                                                    foreach ($teachers as $one) {
                                                        ?>
                                                        <tr class="active">
                                                            <td><?= $i ?></td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/members/view', 'id' => $one->members->id]) ?>"
                                                                   target="_blank"><?= $one->members->fio ?></a>
                                                            </td>
                                                            <td>
                                                                <?= Yii::$app->params['type_of_study'][$one->type_of_studay] ?>
                                                            </td>
                                                            <td>
                                                                <?= $one->create_date ?>
                                                            </td>
                                                            <td>
                                                                <?= Html::button(' <i class="icon md-edit"></i>', ['value' => yii\helpers\Url::to(['/group-tech/update', 'id' => $one->id]), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton waves-effect waves-classic']) ?>
                                                                <?= Html::a('<i class="icon md-delete" aria-hidden="true"></i>', ['/group-tech/delete-sub', 'teach' => $one->teacher_id, 'group' => $model->id], [
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
                                            <div class="col-md-12">
                                                <h4 class="example-title"><?= Yii::t('main', 'Teachers history') ?></h4>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?= Yii::t('main', 'Members') ?></td>
                                                        <td><?= Yii::t('main', 'Type Of Study') ?></td>
                                                        <td><?= Yii::t('main', 'Begin Date') ?></td>
                                                        <td><?= Yii::t('main', 'End Date') ?></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?
                                                    $i = 1;
                                                    $teachers = \backend\models\HGroupTech::find()->where(['group_id' => $model->id])->all();
                                                    foreach ($teachers as $one) {
                                                        ?>
                                                        <tr class="danger">
                                                            <td><?= $i ?></td>
                                                            <td>
                                                                <a href="<?= \yii\helpers\Url::to(['/members/view', 'id' => $one->members->id]) ?>"
                                                                   target="_blank"><?= $one->members->fio ?></a>
                                                            </td>
                                                            <td>
                                                                <?= Yii::$app->params['type_of_study'][$one->type_of_study] ?>
                                                            </td>
                                                            <td>
                                                                <?= $one->begin_date ?>
                                                            </td>
                                                            <td>
                                                                <?= $one->end_date ?>
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