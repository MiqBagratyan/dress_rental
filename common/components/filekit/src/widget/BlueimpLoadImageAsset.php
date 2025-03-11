<?php
namespace common\components\filekit\src\widget;

use yii\web\AssetBundle;

class BlueimpLoadImageAsset extends AssetBundle
{
    public $sourcePath = '@npm/blueimp-load-image';

    public $js = [
        'js/load-image.all.min.js'
    ];
}
