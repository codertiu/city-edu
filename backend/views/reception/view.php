<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Reception */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Receptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="page">
        <div class="page-content">

            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-actions">
                        <div class="item-actions">
                            <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-arrow-left"></i>', ['/reception']) ?>
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
                    <h3 class="panel-title"><?= $model->name . " " . $model->surname ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row row-lg">
                        <div class="col-lg-5">
                            <?php
                            if (User::hasRole('Teacher')) {
                                ?>
                                <p>
                                    <? if ($model->instance_id == 1) { ?>
                                        <?= Html::button(Yii::t('main', 'Come'), ['value' => Url::to(['/reception-tech/create', 'id' => $model->id]), 'class' => 'btn btn-info modalButton']) ?>
                                        <?= Html::a(Yii::t('main', 'Rad etdi'), ['change', 'changeId' => $model->id, 'position' => 7], ['class' => 'btn btn-danger']) ?>
                                    <? } else if ($model->instance_id == 2) { ?>
                                        <?= Html::a(Yii::t('main', 'Qatnashib ko\'rdi'), ['change', 'changeId' => $model->id, 'position' => 3], ['class' => 'btn btn-warning']) ?>
                                    <? } else if ($model->instance_id == 3) { ?>
                                        <?= Html::a(Yii::t('main', 'Ro\'yxatdan o\'tdi'), ['/reception/register', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                                        <?= Html::button(Yii::t('main', 'Rad etdi'), ['value' => Url::to(['/reception/comment', 'changeId' => $model->id]), 'class' => 'btn btn-danger modalButton']) ?>
                                    <? } else if ($model->instance_id == 5 || $model->instance_id == 7) { ?>
                                        <?= Html::a(Yii::t('main', 'Qayta urunish'), ['change', 'changeId' => $model->id, 'position' => 1], ['class' => 'btn btn-info']) ?>
                                    <? } ?>
                                </p>
                            <? } ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><?= Yii::t('main', 'Action') ?></th>
                                    <th><?= Yii::t('main', 'Live') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Edu Center') ?></td>
                                    <td><?= $model->eduCenter->name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Name') ?></td>
                                    <td><?= $model->name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Surname') ?></td>
                                    <td><?= $model->surname ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Date of birth') ?></td>
                                    <td><?= $model->dob ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Phone') ?></td>
                                    <td><?= $model->tel ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Phone2') ?></td>
                                    <td><?= $model->phone2 ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Phone3') ?></td>
                                    <td><?= $model->phone3 ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Phone4') ?></td>
                                    <td><?= $model->phone4 ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Type Edu Id') ?></td>
                                    <td><?= $model->typeEdu->name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Lavel') ?></td>
                                    <td><?= Yii::$app->params['lavel'][$model->lavel] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Language') ?></td>
                                    <td><?= Yii::$app->params['language'][$model->language] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Study Type') ?></td>
                                    <td><?= Yii::$app->params['study_type'][$model->study_type] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Coming ID') ?></td>
                                    <td><?= $model->coming->name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Date Coming') ?></td>
                                    <td><?= $model->date_coming ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Comfortable time') ?></td>
                                    <td><?= Yii::$app->params['comfortable_time'][$model->comfortable_time] ?>
                                        - <?= $model->time ?></td>
                                </tr>

                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Creator') ?></td>
                                    <td><?= $model->user->username ?></td>
                                </tr>
                                <tr>
                                    <td class="text-middle"><?= Yii::t('main', 'Instance') ?></td>
                                    <td><?= Yii::$app->params['instance_id'][$model->instance_id] ?></td>
                                </tr>
                                <?php if ($model->comment_id != null) { ?>
                                    <tr>
                                        <td class="text-middle"><?= Yii::t('main', 'Coment Id') ?></td>
                                        <td><?= $model->commentIDT->name ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <?php
                            $teacher = \backend\models\ReceptionTech::find()->where(['reception_id' => $model->id])->orderBy('id')->all();
                            if ($teacher) {
                                ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <th><?= Yii::t('main', 'Date Coming') ?></th>
                                        <th><?= Yii::t('main', 'Teacher') ?></th>
                                        <th><?= Yii::t('main', 'Action') ?></th>
                                    </thead>
                                    <tbody>
                                    <? foreach ($teacher as $t) { ?>
                                        <tr>
                                            <td><?= $t->date ?></td>
                                            <td><?= $t->member->fio ?></td>
                                            <?php
                                            if ($model->instance_id == 2) {
                                                ?>
                                                <td><?= Html::button('<i class="icon md-edit" aria-hidden="true"></i>', ['value' => Url::to(['/reception-tech/update', 'id' => $t->id]), 'class' => 'btn btn-info', 'class' => 'modalButton']) ?></td>
                                            <? } ?>
                                        </tr>
                                    <? } ?>
                                    </tbody>
                                </table>
                            <? } ?>
                        </div>
                        <div class="col-lg-7">
                            <div class="example example-well margin-top-0 padding-30">
                                <div id="examplePanel" class="panel margin-bottom-0">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?= Yii::t('main', 'Call Name') ?>
                                            - <?= $model->call_name ?></h3>
                                    </div>
                                    <div class="panel-body">

                                        <div class="chats-wrap">
                                            <div class="chats" style="height: 400px; overflow: scroll">
                                                <?
                                                foreach ($note_info as $one):
                                                    ?>
                                                    <div class="chat chat-right">
                                                        <div class="chat-body">
                                                            <div class="chat-content">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <small class="text-muted pull-right"><?= date('d/M/Y H:i', strtotime($one->create_date)) ?></small>
                                                                        <h4 class="media-heading"><?= $one->user->username ?></h4>
                                                                        <div> <?= $one->text ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                endforeach
                                                ?>
                                                <? if ($model->comment) { ?>
                                                    <div class="chat chat-right">
                                                        <div class="chat-body">
                                                            <div class="chat-content">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <small class="text-muted pull-right"><?= date('d/M/Y H:i', strtotime($model->create_date)) ?></small>
                                                                        <h4 class="media-heading"><?= $model->user->username ?></h4>
                                                                        <div> <?= $model->comment ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="example example-well margin-top-0 padding-30">
                                <div id="examplePanel" class="panel margin-bottom-0">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?= Yii::t('main', 'Note') ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <? $form = \yii\widgets\ActiveForm::begin([
                                            'action' => ['reception/note'],
                                            'method' => 'post']) ?>
                                        <?= $form->field($note, 'reception_id')->hiddenInput(['value' => $model->id])->label(false) ?>
                                        <?= $form->field($note, 'text')->textarea() ?>
                                        <?= Html::submitButton(Yii::t('main', 'create'), ['class' => 'btn btn-success pull-right']) ?>
                                        <? \yii\widgets\ActiveForm::end() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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