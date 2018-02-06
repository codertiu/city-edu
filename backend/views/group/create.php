<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Group */

$this->title = Yii::t('main', 'Create Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
