<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduCenter */

$this->title = Yii::t('main', 'Create Edu Center');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Edu Centers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-center-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
