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
    <nav class="site-navbar navbar navbar-inverse navbar-fixed-top navbar-mega navbar-inverse"
         role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                    data-toggle="menubar">
                <span class="sr-only">Переключить Навигацию</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                    data-toggle="collapse">
                <i class="icon md-more" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand navbar-brand-center" href="<?= Yii::$app->homeUrl ?>">
                <img class="navbar-brand-logo navbar-brand-logo-normal" src="images/logo.png"
                     title="Material">
                <img class="navbar-brand-logo navbar-brand-logo-special" src="images/logo-blue.png"
                     title="Material">
                <span class="navbar-brand-text hidden-xs"> Material</span>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                    data-toggle="collapse">
                <span class="sr-only">Переключить Поиск</span>
                <i class="icon md-search" aria-hidden="true"></i>
            </button>
        </div>
        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                    <li class="hidden-float" id="toggleMenubar">
                        <a data-toggle="menubar" href="#" role="button">
                            <i class="icon hamburger hamburger-arrow-left">
                                <span class="sr-only">Переключить Менюбар</span>
                                <span class="hamburger-bar"></span>
                            </i>
                        </a>
                    </li>
                    <li class="hidden-xs" id="toggleFullscreen">
                        <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                            <span class="sr-only">Переключить Полный экран</span>
                        </a>
                    </li>
                    <li class="hidden-float">
                        <a class="icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                           role="button">
                            <span class="sr-only">Переключить Поиск</span>
                        </a>
                    </li>
                    <li class="dropdown dropdown-fw dropdown-mega">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                           data-animation="fade" role="button">Мегаменю <i class="icon md-chevron-down"
                                                                           aria-hidden="true"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <div class="mega-content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h5>Элементы оформления</h5>
                                            <ul class="blocks-2">
                                                <li class="mega-menu margin-0">
                                                    <ul class="list-icons">
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="animation.html">Анимация</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="buttons.html">Кнопки</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="colors.html">Цвета</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="dropdowns.html">Дропдауны</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="icons.html">Иконки</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="lightbox.html">Лайтбокс</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu margin-0">
                                                    <ul class="list-icons">
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="modals.html">Окна</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="panel-structure.html">Панели</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="overlay.html">Наложения</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="tooltip-popover.html ">Подсказки</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="scrollable.html">Прокрутка</a>
                                                        </li>
                                                        <li><i class="md-chevron-right" aria-hidden="true"></i>
                                                            <a href="typography.html">Типография</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>Медиа
                                                <span class="badge badge-success">4</span>
                                            </h5>
                                            <ul class="blocks-3">
                                                <li>
                                                    <a class="thumbnail margin-0" href="javascript:void(0)">
                                                        <img class="width-full" src="images/placeholder.png" alt="..."
                                                        />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="thumbnail margin-0" href="javascript:void(0)">
                                                        <img class="width-full" src="images/placeholder.png" alt="..."
                                                        />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="thumbnail margin-0" href="javascript:void(0)">
                                                        <img class="width-full" src="images/placeholder.png" alt="..."
                                                        />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="thumbnail margin-0" href="javascript:void(0)">
                                                        <img class="width-full" src="images/placeholder.png" alt="..."
                                                        />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="thumbnail margin-0" href="javascript:void(0)">
                                                        <img class="width-full" src="images/placeholder.png" alt="..."
                                                        />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="thumbnail margin-0" href="javascript:void(0)">
                                                        <img class="width-full" src="images/placeholder.png" alt="..."
                                                        />
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="margin-bottom-0">Аккордион</h5>
                                            <!-- Accordion -->
                                            <div class="panel-group panel-group-simple" id="siteMegaAccordion"
                                                 aria-multiselectable="true"
                                                 role="tablist">
                                                <div class="panel">
                                                    <div class="panel-heading" id="siteMegaAccordionHeadingOne"
                                                         role="tab">
                                                        <a class="panel-title" data-toggle="collapse"
                                                           href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion"
                                                           aria-expanded="false" aria-controls="siteMegaCollapseOne">
                                                            Коллапсирующая группа #1
                                                        </a>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="siteMegaCollapseOne"
                                                         aria-labelledby="siteMegaAccordionHeadingOne"
                                                         role="tabpanel">
                                                        <div class="panel-body">
                                                            Товарищи! начало повседневной работы по формированию позиции
                                                            в значительной степени
                                                            создание дальнейших направлений развития.
                                                            С другой стороны консультация с широким активом.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel">
                                                    <div class="panel-heading" id="siteMegaAccordionHeadingTwo"
                                                         role="tab">
                                                        <a class="panel-title collapsed" data-toggle="collapse"
                                                           href="#siteMegaCollapseTwo"
                                                           data-parent="#siteMegaAccordion" aria-expanded="false"
                                                           aria-controls="siteMegaCollapseTwo">
                                                            Коллапсирующая группа #2
                                                        </a>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="siteMegaCollapseTwo"
                                                         aria-labelledby="siteMegaAccordionHeadingTwo"
                                                         role="tabpanel">
                                                        <div class="panel-body">
                                                            Равным образом укрепление и развитие структуры обеспечивает
                                                            широкому кругу
                                                            (специалистов) участие в формировании направлений
                                                            прогрессивного развития.
                                                            Равным образом постоянное информационно-пропагандистское
                                                            развития.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel">
                                                    <div class="panel-heading" id="siteMegaAccordionHeadingThree"
                                                         role="tab">
                                                        <a class="panel-title collapsed" data-toggle="collapse"
                                                           href="#siteMegaCollapseThree"
                                                           data-parent="#siteMegaAccordion" aria-expanded="false"
                                                           aria-controls="siteMegaCollapseThree">
                                                            Коллапсирующая группа #3
                                                        </a>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="siteMegaCollapseThree"
                                                         aria-labelledby="siteMegaAccordionHeadingThree"
                                                         role="tabpanel">
                                                        <div class="panel-body">
                                                            Значимость этих проблем настолько очевидна, что реализация
                                                            намеченных плановых заданий
                                                            по разработке форм развития. Таким образом рамки и место
                                                            обучения кадров влечет за собой процесс внедрения.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Accordion -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- End Navbar Toolbar -->
                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"
                           data-animation="scale-up"
                           aria-expanded="false" role="button">
                            <span class="flag-icon flag-icon-ru"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-ru"></span> Русский</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-fr"></span> French</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-cn"></span> Chinese</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-de"></span> German</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-nl"></span> Dutch</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                           data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="images/5.jpg" alt="...">
                <i></i>
              </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem"><i class="icon md-account"
                                                                                aria-hidden="true"></i> Профиль</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem"><i class="icon md-card"
                                                                                aria-hidden="true"></i> Биллинг</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem"><i class="icon md-settings"
                                                                                aria-hidden="true"></i> Настройки</a>
                            </li>
                            <li class="divider" role="presentation"></li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem"><i class="icon md-power"
                                                                                aria-hidden="true"></i> Выход</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                           data-animation="scale-up" role="button">
                            <i class="icon md-notifications" aria-hidden="true"></i>
                            <span class="badge badge-danger up">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <li class="dropdown-menu-header" role="presentation">
                                <h5>УВЕДОМЛЕНИЯ</h5>
                                <span class="label label-round label-danger">New 5</span>
                            </li>
                            <li class="list-group" role="presentation">
                                <div data-role="container">
                                    <div data-role="content">
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-receipt bg-red-600 white icon-circle"
                                                       aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Вышло обновление для FriendlyCMS</h6>
                                                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5
                                                        hours ago
                                                    </time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-account bg-green-600 white icon-circle"
                                                       aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Completed the task</h6>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days
                                                        ago
                                                    </time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-settings bg-red-600 white icon-circle"
                                                       aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Settings updated</h6>
                                                    <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days
                                                        ago
                                                    </time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-calendar bg-blue-600 white icon-circle"
                                                       aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Event started</h6>
                                                    <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days
                                                        ago
                                                    </time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-comment bg-orange-600 white icon-circle"
                                                       aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Message received</h6>
                                                    <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days
                                                        ago
                                                    </time>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-menu-footer" role="presentation">
                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                    <i class="icon md-settings" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" role="menuitem">
                                    Все уведомления
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"
                           data-animation="scale-up" role="button">
                            <i class="icon md-email" aria-hidden="true"></i>
                            <span class="badge badge-info up">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <li class="dropdown-menu-header" role="presentation">
                                <h5>СООБЩЕНИЯ</h5>
                                <span class="label label-round label-info">New 3</span>
                            </li>
                            <li class="list-group" role="presentation">
                                <div data-role="container">
                                    <div data-role="content">
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-online">
                            <img src="images/2.jpg" alt="..."/>
                            <i></i>
                          </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Серафим Нождак</h6>
                                                    <div class="media-meta">
                                                        <time datetime="2015-06-17T20:22:05+08:00">30 минут назад</time>
                                                    </div>
                                                    <div class="media-detail">Мне понравилась FriendlyCMS</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-off">
                            <img src="images/3.jpg" alt="..."/>
                            <i></i>
                          </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Василий Писяев</h6>
                                                    <div class="media-meta">
                                                        <time datetime="2015-06-17T12:30:30+08:00">12 часов назад</time>
                                                    </div>
                                                    <div class="media-detail">FriendlyCMS работает с Яндекс.Маркет!
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-busy">
                            <img src="images/4.jpg" alt="..."/>
                            <i></i>
                          </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Равшан Басаврюков</h6>
                                                    <div class="media-meta">
                                                        <time datetime="2015-06-16T18:38:40+08:00">2 дня назад</time>
                                                    </div>
                                                    <div class="media-detail">Хорошая адаптивность шаблона!</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item"
                                           href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms"
                                           target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-away">
                            <img src="images/5.jpg" alt="..."/>
                            <i></i>
                          </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Николай Слоник</h6>
                                                    <div class="media-meta">
                                                        <time datetime="2015-06-15T20:34:48+08:00">3 дня назад</time>
                                                    </div>
                                                    <div class="media-detail">Быстрое оформление заказа - это радует!
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-menu-footer" role="presentation">
                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                    <i class="icon md-settings" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" role="menuitem">
                                    Смотреть все сообщения
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="toggleChat">
                        <a data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
                           data-url="site-sidebar.tpl">
                            <i class="icon md-comment" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->
            <!-- Site Navbar Seach -->
            <div class="collapse navbar-search-overlap" id="site-navbar-search">
                <form role="search">
                    <div class="form-group">
                        <div class="input-search">
                            <i class="input-search-icon md-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="site-search" placeholder="Я ищю...">
                            <button type="button" class="input-search-close icon md-close"
                                    data-target="#site-navbar-search"
                                    data-toggle="collapse" aria-label="Закрыть"></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Site Navbar Seach -->
        </div>
    </nav>
    <div class="site-menubar">
        <div class="site-menubar-body">
            <div>
                <div>
                    <ul class="site-menu">
                        <li class="site-menu-category">Основное</li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle" href="javascript:void(0)" data-dropdown-toggle="false">
                                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                                <span class="site-menu-title">Макеты</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list">
                                    <div>
                                        <div>
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="grids.html">
                                                        <span class="site-menu-title">Сетка Bootstrap</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="layout-grid.html">
                                                        <span class="site-menu-title">Сетка Layout</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="headers.html">
                                                        <span class="site-menu-title">Выбор Заголовка</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="panel-transition.html">
                                                        <span class="site-menu-title">Управляемые панели</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="wide.html">
                                                        <span class="site-menu-title">Широкий Макет</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="two-columns.html">
                                                        <span class="site-menu-title">Две колонки</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="bordered-header.html">
                                                        <span class="site-menu-title">Выделенный Заголовок</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="bordered-header.html">
                                                        <span class="site-menu-title">Выделенный Заголовок</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="page-aside-fixed.html">
                                                        <span class="site-menu-title">Фиксированный сайдбар</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle" href="javascript:void(0)" data-dropdown-toggle="false">
                                <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                                <span class="site-menu-title">Страницы</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list">
                                    <div>
                                        <div>
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item has-sub">
                                                    <a href="javascript:void(0)">
                                                        <span class="site-menu-title">Ошибки</span>
                                                        <span class="site-menu-arrow"></span>
                                                    </a>
                                                    <ul class="site-menu-sub">
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="error-400.html">
                                                                <span class="site-menu-title">400</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="error-403.html">
                                                                <span class="site-menu-title">403</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="error-404.html">
                                                                <span class="site-menu-title">404</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="error-500.html">
                                                                <span class="site-menu-title">500</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="error-503.html">
                                                                <span class="site-menu-title">503</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="faq.html">
                                                        <span class="site-menu-title">Вопросы и Ответы</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="gallery.html">
                                                        <span class="site-menu-title">Галерея</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="gallery-grid.html">
                                                        <span class="site-menu-title">Галерея по Сетке</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="search-result.html">
                                                        <span class="site-menu-title">Найденные результаты</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item has-sub">
                                                    <a href="javascript:void(0)">
                                                        <span class="site-menu-title">Карты</span>
                                                        <span class="site-menu-arrow"></span>
                                                    </a>
                                                    <ul class="site-menu-sub">
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="map-google.html">
                                                                <span class="site-menu-title">Google Карты</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="map-vector.html">
                                                                <span class="site-menu-title">Векторные Карты</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="maintenance.html">
                                                        <span class="site-menu-title">Сайт на реконструкции</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="forgot-password.html">
                                                        <span class="site-menu-title">Вспомнить Пароль</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="lockscreen.html">
                                                        <span class="site-menu-title">Заблокированый экран</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="login.html">
                                                        <span class="site-menu-title">Логин</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="register.html">
                                                        <span class="site-menu-title">Регистрация</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="login-v2.html">
                                                        <span class="site-menu-title">Login V2</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="register-v2.html">
                                                        <span class="site-menu-title">Register V2</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="login-v3.html">
                                                        <span class="site-menu-title">Login V3</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="register-v3.html">
                                                        <span class="site-menu-title">Register V3</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="user.html">
                                                        <span class="site-menu-title">Список Пользователей</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="invoice.html">
                                                        <span class="site-menu-title">Invoice</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="blank.html">
                                                        <span class="site-menu-title">Blank Page</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="email.html">
                                                        <span class="site-menu-title">Email</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="code-editor.html">
                                                        <span class="site-menu-title">Code Editor</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="profile.html">
                                                        <span class="site-menu-title">Profile</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="site-map.html">
                                                        <span class="site-menu-title">Sitemap</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="site-menu-category">Элементы</li>
                        <li class="dropdown site-menu-item has-section has-sub active">
                            <a class="dropdown-toggle" href="javascript:void(0)" data-dropdown-toggle="false">
                                <i class="site-menu-icon md-palette" aria-hidden="true"></i>
                                <span class="site-menu-title">UI</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="dropdown-menu site-menu-sub site-menu-section-wrap blocks-sm-3">
                                <li class="site-menu-section site-menu-item has-sub active">
                                    <header>
                                        <span class="site-menu-title">Базовые UI</span>
                                        <span class="site-menu-arrow"></span>
                                    </header>
                                    <div class="site-menu-scroll-wrap is-section">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-section-list">
                                                    <li class="site-menu-item has-sub">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Panel</span>
                                                            <span class="site-menu-arrow"></span>
                                                        </a>
                                                        <ul class="site-menu-sub">
                                                            <li class="site-menu-item">
                                                                <a class="animsition-link" href="panel-structure.html">
                                                                    <span class="site-menu-title">Panel Structure</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a class="animsition-link" href="panel-actions.html">
                                                                    <span class="site-menu-title">Panel Actions</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a class="animsition-link" href="panel-portlets.html">
                                                                    <span class="site-menu-title">Panel Portlets</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="buttons.html">
                                                            <span class="site-menu-title">Buttons</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="dropdowns.html">
                                                            <span class="site-menu-title">Dropdowns</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="icons.html">
                                                            <span class="site-menu-title">Icons</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="list.html">
                                                            <span class="site-menu-title">List</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="tooltip-popover.html">
                                                            <span class="site-menu-title">Tooltip &amp; Popover</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="modals.html">
                                                            <span class="site-menu-title">Modals</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="tabs-accordions.html">
                                                            <span class="site-menu-title">Tabs &amp; Accordions</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="images.html">
                                                            <span class="site-menu-title">Images</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="badges-labels.html">
                                                            <span class="site-menu-title">Badges &amp; Labels</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="progress-bars.html">
                                                            <span class="site-menu-title">Progress Bars</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="carousel.html">
                                                            <span class="site-menu-title">Carousel</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="typography.html">
                                                            <span class="site-menu-title">Typography</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="colors.html">
                                                            <span class="site-menu-title">Colors</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="utilities.html">
                                                            <span class="site-menu-title">Utilties</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="site-menu-section site-menu-item has-sub">
                                    <header>
                                        <span class="site-menu-title">Расширенные UI</span>
                                        <span class="site-menu-arrow"></span>
                                    </header>
                                    <div class="site-menu-scroll-wrap is-section">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-section-list">
                                                    <li class="site-menu-item hidden-xs site-tour-trigger">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Tour</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="animation.html">
                                                            <span class="site-menu-title">Animation</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="highlight.html">
                                                            <span class="site-menu-title">Highlight</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="lightbox.html">
                                                            <span class="site-menu-title">Lightbox</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="scrollable.html">
                                                            <span class="site-menu-title">Scrollable</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="rating.html">
                                                            <span class="site-menu-title">Rating</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="context-menu.html">
                                                            <span class="site-menu-title">Context Menu</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="alertify.html">
                                                            <span class="site-menu-title">Alertify</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="masonry.html">
                                                            <span class="site-menu-title">Masonry</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="treeview.html">
                                                            <span class="site-menu-title">Treeview</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="toastr.html">
                                                            <span class="site-menu-title">Toastr</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="maps-vector.html">
                                                            <span class="site-menu-title">Векторные Карты</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="maps-google.html">
                                                            <span class="site-menu-title">Google Карты</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="sortable-nestable.html">
                                                            <span class="site-menu-title">Sortable &amp; Nestable</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="bootbox-sweetalert.html">
                                                            <span class="site-menu-title">Bootbox &amp; Sweetalert</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="site-menu-section site-menu-item has-sub">
                                    <header>
                                        <span class="site-menu-title">Структурные</span>
                                        <span class="site-menu-arrow"></span>
                                    </header>
                                    <div class="site-menu-scroll-wrap is-section">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-section-list">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="alerts.html">
                                                            <span class="site-menu-title">Alerts</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="ribbon.html">
                                                            <span class="site-menu-title">Ribbon</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="pricing-tables.html">
                                                            <span class="site-menu-title">Pricing Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="overlay.html">
                                                            <span class="site-menu-title">Overlay</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="cover.html">
                                                            <span class="site-menu-title">Cover</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="timeline-simple.html">
                                                            <span class="site-menu-title">Simple Timeline</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="timeline.html">
                                                            <span class="site-menu-title">Timeline</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="step.html">
                                                            <span class="site-menu-title">Step</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="comments.html">
                                                            <span class="site-menu-title">Comments</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="media.html">
                                                            <span class="site-menu-title">Медиа</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="chat.html">
                                                            <span class="site-menu-title">Chat</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="testimonials.html">
                                                            <span class="site-menu-title">Testimonials</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="nav.html">
                                                            <span class="site-menu-title">Nav</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="navbars.html">
                                                            <span class="site-menu-title">Navbars</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="blockquotes.html">
                                                            <span class="site-menu-title">Blockquotes</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="pagination.html">
                                                            <span class="site-menu-title">Pagination</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="breadcrumbs.html">
                                                            <span class="site-menu-title">Breadcrumbs</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown site-menu-item has-section has-sub">
                            <a class="dropdown-toggle" href="javascript:void(0)" data-dropdown-toggle="false">
                                <i class="site-menu-icon md-puzzle-piece" aria-hidden="true"></i>
                                <span class="site-menu-title">Плагины</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="dropdown-menu site-menu-sub site-menu-section-wrap blocks-sm-3">
                                <li class="site-menu-section site-menu-item has-sub">
                                    <header>
                                        <span class="site-menu-title">Формы</span>
                                        <span class="site-menu-arrow"></span>
                                    </header>
                                    <div class="site-menu-scroll-wrap is-section">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-section-list">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="general.html">
                                                            <span class="site-menu-title">General Elements</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="material.html">
                                                            <span class="site-menu-title">Material Elements</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="advanced.html">
                                                            <span class="site-menu-title">Advanced Elements</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="layouts.html">
                                                            <span class="site-menu-title">Form Layouts</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="wizard.html">
                                                            <span class="site-menu-title">Form Wizard</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="validation.html">
                                                            <span class="site-menu-title">Form Validation</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="masks.html">
                                                            <span class="site-menu-title">Form Masks</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="editable.html">
                                                            <span class="site-menu-title">Form Editable</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item has-sub">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Editors</span>
                                                            <span class="site-menu-arrow"></span>
                                                        </a>
                                                        <ul class="site-menu-sub">
                                                            <li class="site-menu-item">
                                                                <a class="animsition-link"
                                                                   href="editor-summernote.html">
                                                                    <span class="site-menu-title">Summernote</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a class="animsition-link" href="editor-markdown.html">
                                                                    <span class="site-menu-title">Markdown</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a class="animsition-link" href="editor-ace.html">
                                                                    <span class="site-menu-title">Ace Editor</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="image-cropping.html">
                                                            <span class="site-menu-title">Image Cropping</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="file-uploads.html">
                                                            <span class="site-menu-title">File Uploads</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="site-menu-section site-menu-item has-sub">
                                    <header>
                                        <span class="site-menu-title">Таблицы</span>
                                        <span class="site-menu-arrow"></span>
                                    </header>
                                    <div class="site-menu-scroll-wrap is-section">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-section-list">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="basic.html">
                                                            <span class="site-menu-title">Basic Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="bootstrap.html">
                                                            <span class="site-menu-title">Bootstrap Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="floatthead.html">
                                                            <span class="site-menu-title">floatThead</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="responsive.html">
                                                            <span class="site-menu-title">Responsive Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="editable.html">
                                                            <span class="site-menu-title">Editable Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="jsgrid.html">
                                                            <span class="site-menu-title">jsGrid</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="footable.html">
                                                            <span class="site-menu-title">FooTable</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="datatable.html">
                                                            <span class="site-menu-title">DataTables</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="site-menu-section site-menu-item has-sub">
                                    <header>
                                        <span class="site-menu-title">Графики</span>
                                        <span class="site-menu-arrow"></span>
                                    </header>
                                    <div class="site-menu-scroll-wrap is-section">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-section-list">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="chartjs.html">
                                                            <span class="site-menu-title">Chart.js</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="gauges.html">
                                                            <span class="site-menu-title">Gauges</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="flot.html">
                                                            <span class="site-menu-title">Flot</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="peity.html">
                                                            <span class="site-menu-title">Peity</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="sparkline.html">
                                                            <span class="site-menu-title">Sparkline</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="morris.html">
                                                            <span class="site-menu-title">Morris</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="chartist.html">
                                                            <span class="site-menu-title">Chartist.js</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="rickshaw.html">
                                                            <span class="site-menu-title">Rickshaw</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="pie-progress.html">
                                                            <span class="site-menu-title">Pie Progress</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="c3.html">
                                                            <span class="site-menu-title">C3</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle" href="javascript:void(0)" data-dropdown-toggle="false">
                                <i class="site-menu-icon md-widgets" aria-hidden="true"></i>
                                <span class="site-menu-title">Виджеты</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list">
                                    <div>
                                        <div>
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="statistics.html">
                                                        <span class="site-menu-title">Статичные Виджеты</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="data.html">
                                                        <span class="site-menu-title">Виджеты Данных</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="blog.html">
                                                        <span class="site-menu-title">Виджеты Блогов</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="chart.html">
                                                        <span class="site-menu-title">Виджеты Графиков</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="social.html">
                                                        <span class="site-menu-title">Виджеты Соцсетей</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="weather.html">
                                                        <span class="site-menu-title">Виджеты Погоды</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="site-menu-category">Приложения</li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle" href="javascript:void(0)" data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title">Приложения</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list">
                                    <div>
                                        <div>
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="contacts.html">
                                                        <span class="site-menu-title">Контакты</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="calendar.html">
                                                        <span class="site-menu-title">Календарь</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="notebook.html">
                                                        <span class="site-menu-title">Редактор</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="taskboard.html">
                                                        <span class="site-menu-title">Taskboard</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item has-sub">
                                                    <a href="javascript:void(0)">
                                                        <span class="site-menu-title">Документы</span>
                                                        <span class="site-menu-arrow"></span>
                                                    </a>
                                                    <ul class="site-menu-sub">
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="articles.html">
                                                                <span class="site-menu-title">Статьи</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="categories.html">
                                                                <span class="site-menu-title">Категории</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a class="animsition-link" href="article.html">
                                                                <span class="site-menu-title">Статья</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="forum.html">
                                                        <span class="site-menu-title">Форум</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="message.html">
                                                        <span class="site-menu-title">Сообщение</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="projects.html">
                                                        <span class="site-menu-title">Проекты</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="mailbox.html">
                                                        <span class="site-menu-title">Почтовый ящик</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="overview.html">
                                                        <span class="site-menu-title">Медиа</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="work.html">
                                                        <span class="site-menu-title">Работа</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="location.html">
                                                        <span class="site-menu-title">Местоположение</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?=$content?>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="site-footer-legal">© 2016 <a href="http://friendlycms.ru/" target="_blank">FriendlyCMS</a></div>
        <div class="site-footer-right">
            Используйте с <i class="red-600 icon md-favorite"></i> и <a
                    href="http://friendlycms.ru/pages/download-friendlycms" target="_blank">бесплатно</a>
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>