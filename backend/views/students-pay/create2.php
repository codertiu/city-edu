<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\StudentsPay */

$this->title = Yii::t('main', 'Create Students Pay');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Students Pays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Yii::t('main', 'Student') ?>
                    <span class="panel-desc"><?= Yii::t('main', 'Pay') ?></span>
                </h3>
            </div>
            <div class="panel-body">

                <?= $this->render('pay-all', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>

