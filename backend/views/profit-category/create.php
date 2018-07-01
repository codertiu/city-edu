<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ProfitCategory */

$this->title = Yii::t('main', 'Create Profit Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Profit Categories'), 'url' => ['index']];
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
