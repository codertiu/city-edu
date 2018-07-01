<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('main','Reception');
?>
<div class="page">
    <div class="content">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title"><?= Yii::t('main', 'Reception') ?></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <?=Html::a(Yii::t('main','Birthday Students'),['birthday/students'],['class'=>'btn btn-success'] )?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>