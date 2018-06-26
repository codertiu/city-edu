<?php
$this->title = Yii::t('main', 'Birthday Students');
?>

<div class="page">
    <div class="example example-well">
        <div class="page-header text-center">
            <h1 class="page-title"><?= Yii::t('main', 'Birthday') ?></h1>
            <p class="page-description">
                <?= Yii::t('main', 'Students') ?>
            </p>
        </div>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">

                <div class="example-wrap">
                    <h4 class="example-title"><?= Yii::t('main', 'Today Birthday') ?></h4>
                    <h4 class="example-title text-right"><?=Yii::t('main','Date : ')?><?= date('d/M/Y')?></h4>
                    <div class="example table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th><?= Yii::t('main', 'Image') ?></th>
                                <th><?= Yii::t('main', 'Name') ?></th>
                                <th><?= Yii::t('main', 'Date') ?></th>
                                <th><?= Yii::t('main', 'Age') ?></th>
                                <th><?= Yii::t('main', 'Phone') ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <? $i = 1; ?>
                            <? foreach ($today as $t) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td class="cell-300">
                                        <a class="avatar"
                                           href="<?= \yii\helpers\Url::to(['students/view', 'id' => $t->id]) ?>">
                                            <? if ($t->image and is_file($t->image)) { ?>
                                                <img class="img-responsive" src="/admin/<?= $t->image ?>" alt="...">
                                            <? } else { ?>
                                                <img class="img-responsive" src="/admin/images/1.jpg" alt="...">
                                            <? } ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= \yii\helpers\Url::to(['students/view', 'id' => $t->id]) ?>"> <?= $t->fullName ?>
                                        </a>
                                    </td>
                                    <td><?= date('d/M', strtotime($t->dob)) ?></td>
                                    <td><?= date('Y') - date('Y', strtotime($t->dob)) ?></td>
                                    <td><?= $t->tel ?></td>
                                </tr>
                                <? $i++; ?>
                            <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="example-wrap">
                    <h4 class="example-title"><?= Yii::t('main', 'Month Birthday') ?></h4>
                    <div class="example table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th><?= Yii::t('main', 'Image') ?></th>
                                <th><?= Yii::t('main', 'Name') ?></th>
                                <th><?= Yii::t('main', 'Date') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <? $j = 1; ?>
                            <? foreach ($month as $m) { ?>
                                <tr>
                                    <td><?= $j ?></td>
                                    <td class="cell-300">
                                        <a class="avatar"
                                           href="<?= \yii\helpers\Url::to(['students/view', 'id' => $m->id]) ?>">
                                            <? if ($m->image and is_file($m->image)) { ?>
                                                <img class="img-responsive" src="/admin/<?= $m->image ?>" alt="...">
                                            <? } else { ?>
                                                <img class="img-responsive" src="/admin/images/1.jpg" alt="...">
                                            <? } ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= \yii\helpers\Url::to(['students/view', 'id' => $m->id]) ?>"> <?= $m->fullName ?>
                                        </a>
                                    </td>
                                    <td><?= date('d/M', strtotime($t->dob)) ?></td>
                                    <td><?= date('Y') - date('Y', strtotime($t->dob)) ?></td>
                                    <td><?= $t->tel ?></td>
                                </tr>
                                <? $j++; ?>
                            <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
