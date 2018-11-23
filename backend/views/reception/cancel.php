<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = Yii::t('main', 'Cancel List')
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="example-wrap">
                    <h4 class="example-title"><?= Yii::t('main','Cancel List')?></h4>
                    <div class="example table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><?= Yii::t('main', 'Name') ?></th>
                                <th><?= Yii::t('main', 'Phone') ?></th>
                                <th><?= Yii::t('main', 'Instance') ?></th>
                                <th class="text-nowrap"><?= Yii::t('main', 'Action') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($model as $one) { ?>
                                <tr>
                                    <td><a href="<?= Url::to(['/reception/view', 'id' => $one->id]) ?>"><?= $one->name ?></a></td>

                                    <td><a href="<?= Url::to(['/reception/view', 'id' => $one->id]) ?>"><?= $one->tel ?></a></td>

                                    <td><a href="<?= Url::to(['/reception/view', 'id' => $one->id]) ?>"><?= Yii::$app->params['instance_id'][$one->instance_id] ?></a></td>

                                    <td class="text-nowrap">
                                        <button type="button" class="btn btn-sm btn-icon btn-flat btn-default"
                                                data-toggle="tooltip" data-original-title="Edit"
                                                onclick="window.location.href='<?= Url::to(['/reception/view', 'id' => $one->id]) ?>'">
                                            <i class="icon md-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?=LinkPager::widget(['pagination'=>$pagination])?>
            </div>
        </div>
    </div>
</div>
