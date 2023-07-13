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
        'css/site.css',
        'css/custom.css',
        'css/bootstrap.min.css',
        'css/bootstrap-icons.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/tooplate-gotto-job.css'
    ];
    public $js = [
        "js/jquery.min.js",
        "js/bootstrap.min.js",
        "js/owl.carousel.min.js",
        "js/counter.js",
        "js/custom.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}