<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Instance */

$this->title = Yii::t('main', 'Create Instance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Instances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
