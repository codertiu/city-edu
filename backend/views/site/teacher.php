<?php
use common\models\User;
use backend\models\Members;
use yii\helpers\Url;
    $this->title = Yii::t('main','Teacher')
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <? $name = Members::find()->where(['user_id'=>Yii::$app->user->identity->id])->one()->fio;?>
                <h4 class="panel-title"><?=Yii::t('main','Teacher')?> : <?=$name?> </h4>
            </div>
            <div class="panel-body">
                <? if(Yii::$app->session->hasFlash('success')){
                       echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>'.Yii::$app->session->getFlash('success').'</div>';
                }?>
                <?php
                    $teacher_id = Members::find()->where(['user_id'=>Yii::$app->user->identity->id])->one()->id;
                    $group = \backend\models\GroupTech::find()->where(['teacher_id'=>$teacher_id]);
                ?>

                <div class="col-lg-12">
                    <!-- Example Tabs Line -->
                    <div class="example-wrap margin-lg-0">
                        <div class="nav-tabs-horizontal">
                            <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTabsLineOne" aria-controls="exampleTabsLineOne" role="tab"><?=Yii::t('main','Active Group')?></a></li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineTwo" aria-controls="exampleTabsLineTwo" role="tab"><?=Yii::t('main','No active Group')?></a></li>
                                <li class="dropdown" role="presentation" style="display: none;">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="caret"></span>Dropdown </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="" role="presentation"><a data-toggle="tab" href="#exampleTabsLineOne" aria-controls="exampleTabsLineOne" role="tab"><?=Yii::t('main','Active Group')?></a></li>
                                        <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineTwo" aria-controls="exampleTabsLineTwo" role="tab"><?=Yii::t('main','No active Group')?></a></li>
                                    </ul>
                                </li>
                                <li class="nav-tabs-autoline" style="transition-duration: 0.5s, 1s; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1), cubic-bezier(0.4, 0, 0.2, 1); left: 0px; width: 81px;"></li></ul>
                            <div class="tab-content padding-top-20">
                                <div class="tab-pane active" id="exampleTabsLineOne" role="tabpanel">
                                    <table class="table table-hover">
                                        <thead>
                                        <th>№</th>
                                        <th><?=Yii::t('main','Group')?></th>
                                        </thead>
                                        <tbody>
                                        <? $i=1;?>
                                        <? foreach($group->andWhere(['status'=>1])->all() as $g){?>
                                            <tr>
                                                <td><?=$i ?></td>
                                                <td><a href="<?=Url::to(['/mark/put-mark','group_id'=>$g->group_id,'teacher_id'=>$teacher_id])?>"><?=$g->group->name ?></a></td>
                                            </tr>
                                            <?php $i++;
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="exampleTabsLineTwo" role="tabpanel">
                                    <table class="table table-hover">
                                        <thead>
                                        <th>№</th>
                                        <th><?=Yii::t('main','Group')?></th>
                                        </thead>
                                        <tbody>
                                        <? $i=1;?>
                                        <? foreach($group->andWhere(['status'=>0])->all() as $g){?>
                                            <tr>
                                                <td><?=$i ?></td>
                                                <td><?=$g->group->name ?></td>
                                            </tr>
                                            <?php $i++;
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Example Tabs Line With JS -->
                </div>
            </div>
        </div>
    </div>
</div>