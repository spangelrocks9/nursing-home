<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $sourcePath = '@bower/admin-lte';
    public $css = [
        'scripts/font-awesome/css/font-awesome.min.css',
        'scripts/material-design-iconic-font/dist/css/material-design-iconic-font.css',
        'scripts/animate.css/animate.min.css',
        'scripts/misc-pages.css',
        'scripts/core.css',
    ];
    
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
