<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Since */

$this->title = Yii::t('main', 'Create Since');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Sinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="since-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
