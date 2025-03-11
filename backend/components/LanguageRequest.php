<?php

namespace backend\components;

use yii\web\Request;

class LanguageRequest extends Request
{
    public function getPathInfo()
    {
        $pathInfo = parent::getPathInfo();
        $languages = ['ru', 'en', 'hy'];

        foreach ($languages as $lang) {
            if (strpos($pathInfo, $lang . '/') === 0) {
                \Yii::$app->language = $lang;
                return substr($pathInfo, strlen($lang) + 1);
            }
        }

        return $pathInfo;
    }
}