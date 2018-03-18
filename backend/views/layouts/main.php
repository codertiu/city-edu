<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="/images/favicon.ico">
        <? $js = <<<JS
 Breakpoints();
JS;
        $this->registerJs($js, \yii\web\View::POS_HEAD);
        ?>
        <?php $this->head() ?>
    </head>
    <body class="site-navbar-small dashboard layout-boxed">
    <?php $this->beginBody() ?>
    <?= \backend\widgets\NavBar::widget() ?>
    <?= \backend\widgets\Menu::widget() ?>
    <?= $content ?>
    <!-- Footer -->
    <?= \backend\widgets\Footer::widget() ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>