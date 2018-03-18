<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubStudents */

$this->title = Yii::t('main', 'Create Sub Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Sub Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-students-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
