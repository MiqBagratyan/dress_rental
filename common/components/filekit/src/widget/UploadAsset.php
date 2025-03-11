<?php
/**
 * Author: Eugine Terentev <eugine@terentev.net>
 */

namespace common\components\filekit\src\widget;

use yii\web\AssetBundle;

class UploadAsset extends AssetBundle
{
    public $depends = [
        \yii\web\JqueryAsset::class,
        \common\components\filekit\src\widget\BlueimpFileuploadAsset::class,
        \common\components\filekit\src\widget\FontAwesomeAsset::class
    ];

    public $sourcePath = __DIR__ . '/assets';

    public $css = [
        YII_DEBUG ? 'css/upload-kit.css' : 'css/upload-kit.min.css'
    ];

    public $js = [
        'js/upload-kit.js'
    ];
}
