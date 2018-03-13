<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Coming */

$this->title = Yii::t('main', 'Create Coming');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Comings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coming-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
