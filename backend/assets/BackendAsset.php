<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 3:14 PM
 */

namespace backend\assets;

use common\assets\AdminLte;
use common\assets\AdminLte3;
use common\assets\Html5shiv;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class BackendAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';
    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $css = [
        'css/style.css?v=4',
    ];
    /**
     * @var array
     */
    public $js = [
//        'js/custom_br_plugin.js?v=2',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        AdminLte3::class,
    ];
}
