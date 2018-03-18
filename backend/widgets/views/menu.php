<?
use yii\helpers\Url;
?>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category">Основное</li>
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" href="<?= Url::to(['/reception/index']) ?>" data-dropdown-toggle="false">
                            <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                            <span class="site-menu-title"><?=Yii::t('main','Reception')?></span>
                        </a>
                    </li>
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" href="<?= Url::to(['/members/index']) ?>" data-dropdown-toggle="false">
                            <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                            <span class="site-menu-title"><?=Yii::t('main','Members')?></span>
                        </a>
                    </li>
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" href="<?= Url::to(['/students/index']) ?>" data-dropdown-toggle="false">
                            <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                            <span class="site-menu-title"><?=Yii::t('main','Students')?></span>
                        </a>
                    </li>
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" href="<?= Url::to(['/group/index']) ?>" data-dropdown-toggle="false">
                            <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                            <span class="site-menu-title"><?=Yii::t('main','Group')?></span>
                        </a>
                    </li>
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" href="<?= Url::to(['/schedule/index']) ?>" data-dropdown-toggle="false">
                            <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                            <span class="site-menu-title"><?=Yii::t('main','Schedules')?></span>
                        </a>
                    </li>
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle waves-effect waves-classic" href="javascript:void(0)" data-dropdown-toggle="false">
                            <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                            <span class="site-menu-title"><?=Yii::t('main','Settings')?></span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="site-menu-scroll-wrap is-list scrollable scrollable-inverse is-enabled scrollable-vertical" style="position: relative;">
                                <div class="scrollable-container" style="height: 342px; width: 234px;">
                                    <div class="scrollable-content" style="width: 217px;">
                                        <ul class="site-menu-sub site-menu-normal-list">
                                            <li class="site-menu-item">
                                                <a class="animsition-link waves-effect waves-classic" href="<?= Url::to(['/room/index']) ?>">
                                                    <span class="site-menu-title"><?=Yii::t('main','Room')?></span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link waves-effect waves-classic" href="<?= Url::to(['/type-edu/index']) ?>">
                                                    <span class="site-menu-title"><?=Yii::t('main','Type Edu')?></span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link waves-effect waves-classic" href="<?= Url::to(['/coming/index']) ?>">
                                                    <span class="site-menu-title"><?=Yii::t('main','Coming')?></span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link waves-effect waves-classic" href="<?= Url::to(['/coming/index']) ?>">
                                                    <span class="site-menu-title"><?=Yii::t('main','Coming')?></span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link waves-effect waves-classic" href="<?= Url::to(['/instance/index']) ?>">
                                                    <span class="site-menu-title"><?=Yii::t('main','Instance')?></span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link waves-effect waves-classic" href="<?= Url::to(['/since/index']) ?>">
                                                    <span class="site-menu-title"><?=Yii::t('main','Since')?></span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link waves-effect waves-classic" href="<?= Url::to(['/comment/index']) ?>">
                                                    <span class="site-menu-title"><?=Yii::t('main','Comment')?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled" draggable="false"><div class="scrollable-bar-handle"></div></div></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>