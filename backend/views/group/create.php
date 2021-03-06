<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Group */

$this->title = Yii::t('main', 'Create Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?>
            <span class="panel-desc"> </span>
        </h3>
    </div>
    <?= $this->render('_form_', [
        'model' => $model,
        'students' => $students,
        'sub_student' => $sub_student
//        'first' => $first,
//        'second'=>$second
    ]) ?>

</div>
