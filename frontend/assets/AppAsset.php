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
        '/css/site.css',
        '/css/footer.css',
        '/css/header.css',
        '/css/elements.css',
        '/css/blog.css',
        'assets/owl-carousel/owl.carousel.min.css',
        'assets/owl-carousel/owl.theme.default.min.css',
        'css/slider.css', 
    ];
    public $js = [
        '/js/custom.js',
        '/js/bootstrap.min.js',
        '/js/countUp.js',
        '/js/dateRangePicker.js',
        '/js/ion.rangeSlider.min.js',
        '/js/jquery.flexslider-min.js',
        '/js/jquery.nicescroll.min.js',
        '/js/jquery.smooth-scroll.js',
        '/js/jquery-3.2.0.min.js',
        '/js/lightbox.min.js',
        '/js/owl.carousel.min.js',
        '/js/select2.min.js',
        'assets/owl-carousel/owl.carousel.min.js',
        'js/slider.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
