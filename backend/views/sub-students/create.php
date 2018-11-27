<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubStudents */

$this->title = Yii::t('main', 'Create Sub Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Sub Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">

    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id
    ]) ?>

</div>
