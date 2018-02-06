<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */

$this->title = Yii::t('main', 'Create Schedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
