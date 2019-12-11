<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/style.css',
        'css/swiper.min.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/popover.js',
        'js/bootstrap.min.js',
        'js/wow.js',
        'js/owl.js',
        'js/swiper.min.js',
        'js/validate.js',
        'js/mixitup.js',
        'js/isotope.js',
        'js/appear.js',
        'js/jquery.fancybox.js',
        'js/jquery.background-video.js',
        'js/jquery.mCustomScrollbar.min.js',
        'js/jquery.bootstrap-touchspin.js',
        'js/script.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
