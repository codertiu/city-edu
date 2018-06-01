<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-extend.min.css',
        'css/site.min.css',
        //'vendor/animsition/animsition.css',
        'vendor/asscrollable/asScrollable.css',
        'vendor/switchery/switchery.css',
        'vendor/intro-js/introjs.css',
        'vendor/slidepanel/slidePanel.css',
        'vendor/flag-icon-css/flag-icon.css',
        'vendor/waves/waves.css',
        'vendor/chartist-js/chartist.css',
        'vendor/jvectormap/jquery-jvectormap.css',
        'vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css',
        //'css/dashboard/v1.css',
        'fonts/web-icons/web-icons.css',
        'fonts/material-design/material-design.min.css',
        'fonts/brand-icons/brand-icons.min.css',
        //'http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'

    ];
    public $js = [
        ['vendor/modernizr/modernizr.js','position' => \yii\web\View::POS_HEAD],
        ['vendor/breakpoints/breakpoints.js','position' => \yii\web\View::POS_HEAD],
        //['vendor/jquery/jquery.js','position' => \yii\web\View::POS_HEAD],
        //'vendor/bootstrap/bootstrap.js',
        //'vendor/animsition/animsition.js',
        'vendor/asscroll/jquery-asScroll.js',
        'vendor/mousewheel/jquery.mousewheel.js',
        'vendor/asscrollable/jquery.asScrollable.all.js',
        'vendor/ashoverscroll/jquery-asHoverScroll.js',
        'vendor/waves/waves.js',
        'vendor/switchery/switchery.min.js',
        'vendor/intro-js/intro.js',
        'vendor/screenfull/screenfull.js',
        'vendor/slidepanel/jquery-slidePanel.js',
        //'vendor/chartist-js/chartist.min.js',
        //'vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js',
        'vendor/jvectormap/jquery-jvectormap.min.js',
        'vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js',
        'vendor/matchheight/jquery.matchHeight-min.js',
        'vendor/peity/jquery.peity.min.js',
        'vendor/formatter-js/jquery.formatter.js',

        'js/core.js',
        'js/site.js',
        'js/sections/menu.js',
        'js/sections/menubar.js',
        'js/sections/sidebar.js',
        'js/configs/config-colors.js',
        'js/configs/config-tour.js',
        'js/components/asscrollable.js',
        //'js/components/animsition.js',
        'js/components/slidepanel.js',
        'js/components/switchery.js',
        'js/components/tabs.js',
        'js/components/matchheight.js',
        'js/components/jvectormap.js',
        'js/components/peity.js',
        'js/dashboard/v1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
