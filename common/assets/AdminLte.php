<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 8/2/14
 * Time: 11:40 AM
 */

namespace common\assets;

use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class AdminLte extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/admin-lte/dist';
    /**
     * @var array
     */
    public $js = [
        'js/app.js'
    ];
    /**
     * @var array
     */
    public $css = [
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
    ];
    /**
     * @var array
     */
    public $depends = [
        JqueryAsset::class,
        BootstrapPluginAsset::class,
        FontAwesome::class,
        JquerySlimScroll::class
    ];
}
