<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = Yii::t('main', 'Create Contract');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Contracts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>

            <?= $this->render('_form', [
                'model' => $model,
                'id' => $id
            ]) ?>
        </div>
    </div>
</div>
