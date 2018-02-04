<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TypeEdu */

$this->title = Yii::t('main', 'Create Type Edu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Type Edus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-edu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
