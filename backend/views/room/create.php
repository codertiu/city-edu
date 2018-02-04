<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Room */

$this->title = Yii::t('main', 'Create Room');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
