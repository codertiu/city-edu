<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
                <h3 class="panel-title"><?= $model->name." " .$model->surname ?></h3>
            </div>
            <div class="panel-body">
                <div class="row row-lg">
                    <div class="col-lg-5">
                        <p>
                            <?= Html::a(Yii::t('main', 'Reception'), ['/reception'], ['class' => 'btn btn-success']) ?>
                            <?= Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><?=Yii::t('main','Action')?></th>
                                <th><?=Yii::t('main','Live')?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Name')?></td>
                                <td><?=$model->name?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Surname')?></td>
                                <td><?=$model->surname?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Date of birth')?></td>
                                <td><?=$model->dob?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Phone')?></td>
                                <td><?=$model->tel?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Phone2')?></td>
                                <td><?=$model->phone2?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Phone3')?></td>
                                <td><?=$model->phone3?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Phone4')?></td>
                                <td><?=$model->phone4?></td>
                            </tr>

                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Type Edu Id')?></td>
                                <td><?=$model->typeEdu->name?></td>
                            </tr>

                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Lavel')?></td>
                                <td><?=$model->lavel?></td>
                            </tr>

                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Language')?></td>
                                <td><?= Yii::$app->params['language'][$model->language]?></td>
                            </tr>

                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Coming ID')?></td>
                                <td><?=$model->coming->name?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Date Coming')?></td>
                                <td><?=$model->date_coming?></td>
                            </tr>
                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Comfortable time')?></td>
                                <td><?=$model->comfortable_time?></td>
                            </tr>

                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Instance')?></td>
                                <td><?=$model->instance->name?></td>
                            </tr>

                            <tr>
                                <td class="text-middle"><?=Yii::t('main','Creator')?></td>
                                <td><?=$model->user->username?></td>
                            </tr>
                            </tbody><tbody>
                            </tbody></table>
                    </div>
                    <div class="col-lg-7">
                        <div class="example example-well margin-top-0 padding-30">
                            <div id="examplePanel" class="panel margin-bottom-0">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?=Yii::t('main','Comment')?> - <?=$model->user->username?></h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group list-group-dividered list-group-full">
                                        <?
                                        foreach ($note_info as $one):
                                            ?>
                                            <li class="list-group-item">
                                            <div class="media">
                                                <div class="media-body">
                                                    <small class="text-muted pull-right"><?=date('d/M/Y H:i',strtotime($one->create_date))?></small>
                                                    <h4 class="media-heading"><?= $one->user->username ?></h4>
                                                    <div> <?=$one->text?></div>
                                                </div>
                                            </div>
                                            </li>
                                            <?
                                        endforeach
                                        ?>
                                        <li class="list-group-item">
                                            <div class="media">
                                                <div class="media-body">
                                                    <small class="text-muted pull-right"><?=date('d/M/Y H:i',strtotime($model->create_date))?></small>
                                                    <h4 class="media-heading"><?=$model->user->username?></h4>
                                                    <div> <?=$model->comment?></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="example example-well margin-top-0 padding-30">
                            <div id="examplePanel" class="panel margin-bottom-0">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?=Yii::t('main','Note')?></h3>
                                </div>
                                <div class="panel-body">
                                    <? $form = \yii\widgets\ActiveForm::begin([
                                        'action' =>['reception/note'],
                                        'method' => 'post'])?>
                                        <?=$form->field($note,'reception_id')->hiddenInput(['value'=>$model->id])->label(false)?>
                                        <?=$form->field($note,'text')->textarea()?>
                                        <?=Html::submitButton(Yii::t('main','create'),['class'=>'btn btn-success pull-right'])?>
                                    <? \yii\widgets\ActiveForm::end()?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>