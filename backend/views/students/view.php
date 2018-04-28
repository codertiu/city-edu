<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */

$this->title = $model->name;
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
            <div class="panel-body">


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $model->fullName ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                                src="/admin/<?= $model->image ?>"
                                                                                width="150" height="150"
                                                                                class="img-circle img-bordered img-bordered-orange">
                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td><?= Yii::t('main', 'ID') ?>:</td>
                                        <td><?= $model->id ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('main', 'Date of Birth') ?></td>
                                        <td><?= $model->dob ?></td>
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
                                        <td><a href="mailto:<?= $model->email ?>"><?= $mode->email ?></a></td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('main', 'Phone Number') ?></td>
                                        <td><?= $model->tel ?>
                                            <?if($model->phone2){?>
                                            <br><br> <?= $model->phone2 ?>
                                            <?}?>
                                            <?if($model->phone3){?>
                                            <br><br> <?= $model->phone3 ?>
                                            <?}?>
                                            <?if($model->phone4){?>
                                            <br><br> <?= $model->phone4 ?>
                                            <?}?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('main', 'reg date') ?></td>
                                        <td><?= $model->regDate ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('main', 'Edu Center ID') ?></td>
                                        <td><?= $model->eduCenterID->name ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('main', 'Active') ?></td>
                                        <td><?= Yii::$app->params['active'][$model->active]?></td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('main', 'Pass File') ?></td>
                                        <td>
                                            <?if($model->pass_file){?>
                                            <a href="/admin/<?=$model->pass_file?>"><?=Yii::t('main','Passport')?></a>
                                            <?}?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('main', 'File') ?></td>
                                        <td>
                                            <?if($model->file){?>
                                            <a href="/admin/<?=$model->file?>"><?=Yii::t('main','File')?></a>
                                            <?}?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <a href="#" class="btn btn-primary">My Sales Performance</a>
                                <a href="#" class="btn btn-primary">Team Sales Performance</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button"
                           class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>

                </div>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        'surname',
                        'tel',
                        'phone2',
                        'phone3',
                        'phone4',
                        'gendar',
                        'address',
                        'member_id',
                        'reg_date',
                        'edu_center_id',
                        'image',
                        'file',
                        'pass_file',
                        'email:email',
                        'dob',
                        'active',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
