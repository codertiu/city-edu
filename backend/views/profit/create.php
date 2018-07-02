<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Profit */

$this->title = Yii::t('main', 'Create Profit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Profits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?>
            <span class="panel-desc"> </span>
        </h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
