<?php

namespace backend\widgets;

use yii\web\JsExpression;
use common\components\filekit\src\widget\Upload as U;

class Upload extends U
{
    public function init()
    {
        if (empty($this->url))
            $this->url = ['/files/file/storage/upload'];

        parent::init();
    }
}
