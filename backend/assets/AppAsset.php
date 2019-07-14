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
        #libs
        'libs/bootstrap/bootstrap.min.css',
        'libs/bootstrap/bootstrap-extend.min.css',
        'libs/skintools/skintools.min.css',
        'libs/animsition/animsition.min.css',
        'libs/asscrollable/asScrollable.min.css',
        'libs/switchery/switchery.min.css',
        'libs/ntro-js/introjs.min.css',
        'libs/slidepanel/slidePanel.min.css',
        'libs/flag-icon-css/flag-icon.min.css',
        'libs/nprogress/nprogress.min.css',
        'libs/animation/animation.min.css',
        'libs/web-icons/web-icons.min.css',
        'libs/brand-icons/brand-icons.min.css',
        'libs/font-google/css.css',
        'libs/font-awesome/font-awesome.min.css?v4.0.2',
        # End libs
        # custom
        'css/site.min.css',
        'css/main.css'
        #end custom
    ];
    public $js = [
        'https://unpkg.com/react@16/umd/react.development.js',
        'https://unpkg.com/react-dom@16/umd/react-dom.development.js',
        'https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.24.0/babel.js',
        'libs/skintools/skintools.min.js',
        'libs/breakpoints/breakpoints.min.js',
        'libs/babel-external-helpers/babel-external-helpers.js',
        'libs/popper-js/popper.min.js',
        'libs/bootstrap/bootstrap.min.js',
        'libs/bootstrap/bootstrap-anchor.min.js',
        'libs/animsition/animsition.min.js',
        'libs/mousewheel/jquery.mousewheel.js',
        'libs/asscrollable/jquery-asScrollable.min.js',
        'libs/ashoverscroll/jquery-asHoverScroll.min.js',
        'libs/switchery/switchery.min.js',
        'libs/intro-js/intro.min.js',
        'libs/screenfull/screenfull.js',
        'libs/slidepanel/jquery-slidePanel.min.js',
        'libs/jquery-appear/jquery.appear.js',
        'libs/nprogress/nprogress.js',
        'libs/Component/Component.min.js',
        'libs/global/Plugin.min.js',
        'libs/global/Base.min.js',
        'libs/global/Config.min.js',
        'libs/Section/Menubar.min.js',
        'libs/Section/GridMenu.min.js',
        'libs/Section/Sidebar.min.js',
        'libs/Section/PageAside.min.js',
        'libs/Plugin/menu.min.js',
        'libs/global/colors.min.js',
        'libs/config/tour.min.js',
        'js/Site.min.js',
        'libs/global/asscrollable.min.js',
        'libs/global/jquery-asScrollbar.min.js',
        'libs/global/slidepanel.min.js',
        'libs/global/switchery.min.js',
        'libs/global/jquery-appear.min.js',
        'libs/global/nprogress.min.js',
        'libs/global/animation.min.js',
        'js/base.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
