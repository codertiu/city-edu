<?
use yii\helpers\Url;

use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

?>
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
        <a class="navbar-brand navbar-brand-center" href="<?= Url::to(['/reception/index']); ?>">
            <img class="navbar-brand-logo navbar-brand-logo-normal"
                 src="<?= \yii\helpers\Url::base(); ?>/images/logo.png"
                 title="Material">
            <img class="navbar-brand-logo navbar-brand-logo-special"
                 src="<?= \yii\helpers\Url::base(); ?>/images/logo-blue.png"
                 title="Material">
            <span class="navbar-brand-text hidden-xs"> City-Edu</span>
        </a>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only"><?=Yii::t('main','Переключить Поиск')?></span>
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
                            <span class="sr-only"><?= Yii::t('main', 'Переключить Менюбар') ?></span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only"><?= Yii::t('main', 'Переключить Полный экран') ?></span>
                    </a>
                </li>
                <li class="hidden-float">
                    <a class="icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                       role="button">
                        <span class="sr-only"><?= Yii::t('main', 'Переключить Поиск') ?></span>
                    </a>
                </li>
                <!--  <li class="dropdown dropdown-fw dropdown-mega">
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
                                                    <img class="width-full" src="<?= \yii\helpers\Url::base(); ?>/images/placeholder.png" alt="..."
                                                    />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="thumbnail margin-0" href="javascript:void(0)">
                                                    <img class="width-full" src="<?= \yii\helpers\Url::base(); ?>/images/placeholder.png" alt="..."
                                                    />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="thumbnail margin-0" href="javascript:void(0)">
                                                    <img class="width-full" src="<?= \yii\helpers\Url::base(); ?>/images/placeholder.png" alt="..."
                                                    />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="thumbnail margin-0" href="javascript:void(0)">
                                                    <img class="width-full" src="<?= \yii\helpers\Url::base(); ?>/images/placeholder.png" alt="..."
                                                    />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="thumbnail margin-0" href="javascript:void(0)">
                                                    <img class="width-full" src="<?= \yii\helpers\Url::base(); ?>/images/placeholder.png" alt="..."
                                                    />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="thumbnail margin-0" href="javascript:void(0)">
                                                    <img class="width-full" src="<?= \yii\helpers\Url::base(); ?>/images/placeholder.png" alt="..."
                                                    />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 class="margin-bottom-0">Аккордион</h5>
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
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>-->
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"
                       data-animation="scale-up"
                       aria-expanded="false" role="button">
                        <i class="site-menu-icon icon md-accounts-alt" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                    <?
                    echo GhostMenu::widget([
                        'encodeLabels'=>false,
                        'activateParents'=>true,
                        'items' => [
                            [
                                'label' => 'Backend routes',
                                'items'=>UserManagementModule::menuItems()
                            ],
                            [
                                'label' => 'Frontend routes',
                                'items'=>[
                                    ['label'=>'Login', 'url'=>['/user-management/auth/login']],
                                    ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                                    ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                                    ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                                    ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                                    ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                                ],
                            ],
                        ],
                    ]);
                    ?>
                    </ul>
                </li>
                <!--<li class="dropdown">

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

                </li>-->
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="<?= \yii\helpers\Url::base(); ?>/images/5.jpg" alt="...">
                <i></i>
              </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <!--<li role="presentation">
                            <a href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Профиль</a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> Биллинг</a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Настройки</a>
                        </li>
                        <li class="divider" role="presentation"></li>-->
                        <li role="presentation">
                            <?= \yii\helpers\Html::a(Yii::t('main', '<i class="icon md-power" aria-hidden="true"></i> Выход'), ['/site/logout'], ['data-method' => 'post']) ?>
                        </li>
                    </ul>
                </li>
                <!--
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
                            <img src="<?= \yii\helpers\Url::base(); ?>/images/2.jpg" alt="..."/>
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
                            <img src="<?= \yii\helpers\Url::base(); ?>/images/3.jpg" alt="..."/>
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
                            <img src="<?= \yii\helpers\Url::base(); ?>/images/4.jpg" alt="..."/>
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
                            <img src="<?= \yii\helpers\Url::base(); ?>/images/5.jpg" alt="..."/>
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
                </li>-->

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
                        <input type="text" class="form-control" name="site-search" placeholder="<?=Yii::t('main','Я ищю...')?>">
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