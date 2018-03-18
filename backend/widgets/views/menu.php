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
                            <span class="site-menu-title">Reception</span>
                        </a>
                    </li>
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" href="<?= Url::to(['/members/index']) ?>" data-dropdown-toggle="false">
                            <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                            <span class="site-menu-title">Members</span>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
</div>