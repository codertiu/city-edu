<?
use yii\helpers\Url;
use webvimark\modules\UserManagement\models\User;
?>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category"><?= Yii::t('main', 'Основное') ?></li>
                    <?
                    if (User::hasRole('call-center') || User::hasRole('Admin')) {
                        ?>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Call Center') ?></span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical"
                                     style="position: relative;">
                                    <div class="scrollable-container" style="height: 120px; width: 100px;">
                                        <div class="scrollable-content" style="width: 100px;">
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/reception/call-center']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Call Center') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/first-cancel/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'First Cancel') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/reception/cancel']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Rad etganlar') ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled"
                                         draggable="false">
                                        <div class="scrollable-bar-handle"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <? } ?>
                    <?
                    if (User::hasRole('Reception') || User::hasRole('Admin')) {
                        ?>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Reception') ?></span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical"
                                     style="position: relative;">
                                    <div class="scrollable-container" style="height: 80px; width: 100px;">
                                        <div class="scrollable-content" style="width: 100px;">
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/reception/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Reception') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/reception/cancel']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Rad etganlar') ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled"
                                         draggable="false">
                                        <div class="scrollable-bar-handle"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Members') ?></span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical"
                                     style="position: relative;">
                                    <div class="scrollable-container" style="height: 80px; width: 100px;">
                                        <div class="scrollable-content" style="width: 100px;">
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/members/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Members') ?></span>
                                                    </a>
                                                </li>
                                                <? if(User::hasRole('Admin')){?>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/member-salary/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Members Salary') ?></span>
                                                    </a>
                                                </li>
                                                <?}?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled"
                                         draggable="false">
                                        <div class="scrollable-bar-handle"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Students') ?></span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical"
                                     style="position: relative;">
                                    <div class="scrollable-container" style="height: 80px; width: 100px;">
                                        <div class="scrollable-content" style="width: 100px;">
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/students/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Students') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/students-pay/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Students Pay') ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled"
                                         draggable="false">
                                        <div class="scrollable-bar-handle"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle" href="<?= Url::to(['/group/index']) ?>"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Group') ?></span>
                            </a>
                        </li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle" href="<?= Url::to(['/schedule/index']) ?>"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Schedules') ?></span>
                            </a>
                        </li>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Settings') ?></span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical"
                                     style="position: relative;">
                                    <div class="scrollable-container" style="height: 342px; width: 234px;">
                                        <div class="scrollable-content" style="width: 217px;">
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/room/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Room') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/type-edu/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Type Edu') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/coming/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Coming') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/instance/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Instance') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/since/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Since') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/comment/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Comment') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/edu-center/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Edu center') ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled"
                                         draggable="false">
                                        <div class="scrollable-bar-handle"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <? if(User::hasRole('Admin')){?>
                            <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Accounding') ?></span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical"
                                     style="position: relative;">
                                    <div class="scrollable-container" style="height: 342px; width: 234px;">
                                        <div class="scrollable-content" style="width: 217px;">
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/expense-category/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Expense Category') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/expense/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Expense') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/profit-category/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Profit Category') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/profit']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Profit') ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled"
                                         draggable="false">
                                        <div class="scrollable-bar-handle"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <? }?>

                    <? } ?>

                    <? if (User::hasRole('Reception') || User::hasRole('Admin')) { ?>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Mark') ?></span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical"
                                     style="position: relative;">
                                    <div class="scrollable-container" style="height: 342px; width: 234px;">
                                        <div class="scrollable-content" style="width: 217px;">
                                            <ul class="site-menu-sub site-menu-normal-list">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/mark/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Mark') ?></span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link waves-effect waves-classic"
                                                       href="<?= Url::to(['/extra-mark/index']) ?>">
                                                        <span class="site-menu-title"><?= Yii::t('main', 'Extra mark') ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled"
                                         draggable="false">
                                        <div class="scrollable-bar-handle"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <? } ?>

                    <? if (User::hasRole('Admin')) { ?>
                        <li class="dropdown site-menu-item has-sub">
                            <a class="dropdown-toggle" href="<?= Url::to(['/student-message/index']) ?>"
                               data-dropdown-toggle="false">
                                <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                                <span class="site-menu-title"><?= Yii::t('main', 'Message') ?></span>
                            </a>
                        </li>
                    <? } ?>

                </ul>
            </div>
        </div>
    </div>
</div>