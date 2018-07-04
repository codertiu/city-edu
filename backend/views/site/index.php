<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('main', 'City Edu');
?>
<!-- Page -->
<div class="page">
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h1 class="panel-title"><?= Yii::t('main', 'Admin') ?></h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><a href="<?=Url::to(['/birthday/students'])?>" class="btn btn-success"><?=Yii::t('main','Birthday Students')?> </a></td>
                                    <td><a href="<?=Url::to(['/student-message'])?>" class="btn btn-success"><?=Yii::t('main','Student Message')?> </a></td>
                                    <td><a href="<?=Url::to(['/members'])?>" class="btn btn-success"><?=Yii::t('main','Members')?> </a></td>
                                    <td><a href="<?=Url::to(['/students'])?>" class="btn btn-success"><?=Yii::t('main','Students')?> </a></td>
                                    <td><a href="<?=Url::to(['/group'])?>" class="btn btn-success"><?=Yii::t('main','Groups')?> </a></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
