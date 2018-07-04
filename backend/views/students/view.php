<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="page">
        <div class="page-content">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-actions">
                        <div class="item-actions">
                            <span class="btn btn-pure btn-icon waves-effect waves-classic" data-toggle="list-editable">
                                <?= Html::a('<i class="icon md-arrow-left"></i>', ['/students']) ?>
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
                <div class="panel-body">
                    <div class="example-wrap margin-lg-0">
                        <div class="nav-tabs-horizontal">
                            <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTabsLineOne"
                                                                          aria-controls="exampleTabsLineOne"
                                                                          role="tab"><?= Yii::t('main', 'Student') ?></a>
                                </li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineTwo"
                                                           aria-controls="exampleTabsLineTwo"
                                                           role="tab"><?= Yii::t('main', 'Info Reception') ?></a>
                                </li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineThree"
                                                           aria-controls="exampleTabsLineThree" role="tab">Css</a></li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineFour"
                                                           aria-controls="exampleTabsLineFour"
                                                           role="tab"><?= Yii::t('main', 'Group') ?></a>
                                </li>
                                <li class="dropdown" role="presentation" style="display: none;">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="caret"></span>Dropdown </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="" role="presentation"><a data-toggle="tab" href="#exampleTabsLineOne"
                                                                            aria-controls="exampleTabsLineOne"
                                                                            role="tab"><?= Yii::t('main', 'Student') ?></a>
                                        </li>
                                        <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineTwo"
                                                                   aria-controls="exampleTabsLineTwo"
                                                                   role="tab"><?= Yii::t('main', 'Info Reception') ?></a>
                                        </li>
                                        <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineThree"
                                                                   aria-controls="exampleTabsLineThree"
                                                                   role="tab">Css</a></li>
                                        <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineFour"
                                                                   aria-controls="exampleTabsLineFour"
                                                                   role="tab"><?= Yii::t('main', 'Group') ?></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-tabs-autoline"
                                    style="transition-duration: 0.5s, 1s; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1), cubic-bezier(0.4, 0, 0.2, 1); left: 0px; width: 81px;"></li>
                            </ul>
                            <div class="tab-content padding-top-20">
                                <div class="tab-pane active" id="exampleTabsLineOne" role="tabpanel">
                                    <div class="panel">

                                        <div class="panel-body">

                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><?= $model->fullName ?></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-lg-3 " align="center">
                                                            <? if ($model->image and is_file($model->image)) { ?>
                                                                <img src="/admin/<?= $model->image ?>" alt="..."
                                                                     width="150" height="150"
                                                                     class="img-circle img-bordered img-bordered-orange">
                                                            <? } else { ?>
                                                                <img src="/admin/images/1.jpg" alt="..." width="150"
                                                                     height="150"
                                                                     class="img-circle img-bordered img-bordered-orange">
                                                            <? } ?>
                                                            <br/>
                                                            <br/>
                                                            <?= Html::button(Yii::t('main', 'Create Contract'), ['value' => Url::to(['/contract/create', 'id' => $model->id]), 'class' => 'btn btn-primary modalButton']) ?>
                                                            <br/>
                                                            <br/>
                                                            <?
                                                            $contract = \backend\models\Contract::find()->where(['students_id' => $model->id])->all();
                                                            if ($contract) {
                                                                ?>
                                                                <table class="table table-user-information">
                                                                    <thead>
                                                                    <tr>
                                                                        <td>#</td>
                                                                        <td><?= Yii::t('main', 'Contract') ?></td>
                                                                        <td colspan="2"><?= Yii::t('main', 'Action') ?></td>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?
                                                                    $i = 1;
                                                                    foreach ($contract as $c) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?= $i ?></td>
                                                                            <td><?= $c->contract ?></td>
                                                                            <td><?= Html::button(' <i class="icon md-edit"></i>', ['value' => Url::to(['/contract/update', 'id' => $c->id]), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton']) ?></td>
                                                                            <td><?= Html::a(' <i class="icon md-file"></i>', ['/contract/report', 'id' => $c->id], ['target' => '_blank', 'class' => 'btn-pure  waves-effect waves-classic waves-effect waves-classic']) ?></td>
                                                                        </tr>
                                                                        <? $i++;
                                                                    } ?>
                                                                    </tbody>
                                                                </table>
                                                            <? } ?>

                                                        </div>
                                                        <div class="col-md-9 col-lg-9 ">
                                                            <table class="table table-user-information">
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'ID') ?>:</td>
                                                                    <td><?= $model->id ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Biz bilan birga') ?>:</td>
                                                                    <td><?= $model->getWithUs() ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Date of Birth') ?></td>
                                                                    <td><?= date('d/M/Y', strtotime($model->dob)) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Gender') ?></td>
                                                                    <td><?= Yii::$app->params['gender'][$model->gendar] ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Home Address') ?></td>
                                                                    <td><?= $model->address ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Email') ?></td>
                                                                    <td>
                                                                        <a href="mailto:<?= $model->email ?>"><?= $model->email ?></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Phone Number') ?></td>
                                                                    <td><?= $model->tel ?>
                                                                        <? if ($model->phone2) { ?>
                                                                            <br><br> <?= $model->phone2 ?>
                                                                        <? } ?>
                                                                        <? if ($model->phone3) { ?>
                                                                            <br><br> <?= $model->phone3 ?>
                                                                        <? } ?>
                                                                        <? if ($model->phone4) { ?>
                                                                            <br><br> <?= $model->phone4 ?>
                                                                        <? } ?>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'reg date') ?></td>
                                                                    <td><?= date('d/M/Y  H:i:s', strtotime($model->regDate)) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Edu Center ID') ?></td>
                                                                    <td><?= $model->eduCenterID->name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Active') ?></td>
                                                                    <td><?= Yii::$app->params['active'][$model->active] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'Pass File') ?></td>
                                                                    <td>
                                                                        <? if ($model->pass_file) { ?>
                                                                            <a href="/admin/<?= $model->pass_file ?>"
                                                                               target="_blank"><?= Yii::t('main', 'Passport') ?></a>
                                                                        <? } ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= Yii::t('main', 'File') ?></td>
                                                                    <td>
                                                                        <? if ($model->file) { ?>
                                                                            <a href="/admin/<?= $model->file ?>"
                                                                               target="_blank"><?= Yii::t('main', 'File') ?></a>
                                                                        <? } ?>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <!--- end-row-->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="exampleTabsLineTwo" role="tabpanel">
                                    <div class="row">
                                        <?php $students_info = \backend\models\StudentsInfo::find()->where(['students_id' => $model->id]) ?>
                                        <div class="col-md-6 col-lg-6">
                                            <?php if ($students_info->exists()) {
                                                $students_info = $students_info->one();
                                                ?>
                                                <h4 class="example-title"><?= Yii::t('main', 'Info Reception') ?></h4>
                                                <div class="columns columns-right btn-group pull-right">
                                                    <?= Html::button(' <i class="icon md-edit"></i>', ['value' => Url::to(['/students-info/update', 'id' => $model->id]), 'class' => 'btn btn-default btn-icon waves-effect waves-light modalButton']) ?>
                                                </div>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?= Yii::t('main', 'Action') ?></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><?= Yii::t('main', 'Language') ?></td>
                                                        <td><?= Yii::$app->params['language'][$students_info->language] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= Yii::t('main', 'Type Edu ID') ?></td>
                                                        <td><?= $students_info->typeEduId->name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= Yii::t('main', 'Lavel') ?></td>
                                                        <td><?= Yii::$app->params['lavel'][$students_info->lavel] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= Yii::t('main', 'Study Type') ?></td>
                                                        <td><?= Yii::$app->params['study_type'][$students_info->study_type] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= Yii::t('main', 'Comfortabel Time') ?></td>
                                                        <td><?= Yii::$app->params['comfortable_time'][$students_info->comfortable_time] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= Yii::t('main', 'Time') ?></td>
                                                        <td><?= $students_info->time ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            <?php } else { ?>
                                                <?= Html::button(Yii::t('main', 'Create Students Info'), ['value' => Url::to(['/students-info/create', 'id' => $model->id]), 'class' => 'btn btn-primary modalButton']) ?>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <?php
                                            $contract = \backend\models\Contract::find()->where(['students_id' => $model->id]);
                                            if ($contract->exists()) {
                                                ?>

                                                <?= Html::button(Yii::t('main', 'Pay for contract'), ['value' => Url::to(['/students-pay/create', 'id' => $model->id]), 'class' => 'btn btn-primary modalButton']) ?>

                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?= Yii::t('main', 'Contract') ?></td>
                                                        <td><?= Yii::t('main', 'date') ?></td>
                                                        <td><?= Yii::t('main', 'Sum') ?></td>
                                                        <td><?= Yii::t('main', 'Month') ?></td>
                                                        <td><?= Yii::t('main', 'Action') ?></td>
                                                    </tr>
                                                    </thead>
                                                    <?
                                                    $students_pay = \backend\models\StudentsPay::find()->where(['students_id' => $model->id])->orderBy(['pay_date' => SORT_DESC])->all();
                                                    ?>
                                                    <tbody>
                                                    <? $i = 1;
                                                    foreach ($students_pay as $one) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $one->contract->contract ?></td>
                                                            <td><?= date('d/M/Y', strtotime($one->pay_date)) ?></td>
                                                            <td><?= $one->sum ?></td>
                                                            <td><?= Yii::$app->params['month'][$one->for_month] ?></td>
                                                            <td><?= Html::button('<i class="icon md-edit"></i>', ['value' => Url::to(['/students-pay/update', 'id' => $one->id, 'st' => $model->id]), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton waves-effect waves-classic']) ?></td>
                                                        </tr>
                                                        <? $i++;
                                                    } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="exampleTabsLineThree" role="tabpanel">
                                    Maestitiam quamquam iudicare veterum contineri ipse cognoscerem se omittantur
                                    dialectica,
                                    dixit poterit nondum tempora corpora claudicare ratione percipitur.
                                    Earum comprehenderit laudem platonis allevatio graeci, invidus
                                    coercendi valetudinis numen deseruisse.
                                </div>
                                <div class="tab-pane" id="exampleTabsLineFour" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= Html::button(Yii::t('main', 'Add Group'), ['value' => Url::to(['/sub-students/create', 'id' => $model->id]), 'class' => 'btn btn-primary modalButton']) ?>
                                        </div>
                                        <?
                                        $group = \backend\models\SubStudents::find()->where(['students_id' => $model->id]);
                                        ?>
                                        <div class="col-md-12 col-lg-12">
                                            <? if ($group->exists()) { ?>
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title"><?= Yii::t('main', 'Group') ?></h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <td>#</td>
                                                                <td><?= Yii::t('main', 'Group') ?></td>
                                                                <td><?= Yii::t('main', 'Begin Date') ?></td>
                                                                <td><?= Yii::t('main', 'End Date') ?></td>
                                                                <td><?= Yii::t('main', 'Action') ?></td>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <? $i = 1;
                                                            foreach ($group->all() as $one) { ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td>
                                                                        <a href="<?= Url::to(['/group/view', 'id' => $one->group->id]) ?>"
                                                                           target="_blank"><?= $one->group->name ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?= $one->begin_date ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $one->end_date ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= Html::button(' <i class="icon md-edit"></i>', ['value' => Url::to(['/sub-students/update', 'id' => $one->id]), 'class' => 'btn-pure waves-effect waves-classic waves-effect waves-classic modalButton waves-effect waves-classic']) ?>
                                                                    </td>
                                                                </tr>
                                                                <? $i++;
                                                            } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <? } ?>
                                        </div>
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