<?php

namespace common\components;

use app\models\Category;
use app\models\Manufacturer;
use app\models\Page;
use app\models\Product;
use yii\helpers\Inflector;

class Helper
{
    public static function pr($var,$die = false){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if(!$die) {
            die;
        }
    }

    static function previewFileType($mime)
    {
        switch ($mime) {
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/png':
            case 'image/gif':
            case 'image/webp':
                $type = 'image';
                break;
            case 'application/pdf':
                $type = 'pdf';
                break;
            default:
                $type = '';
        }
        return $type;
    }

    public static function getImageType($filePath) {
        $imageType = @exif_imagetype($filePath);
        switch ($imageType) {
            case IMAGETYPE_WEBP:
                return 'image/webp';
            case IMAGETYPE_PNG:
                return 'image/png';
            case IMAGETYPE_JPEG:
                return 'image/jpeg';
            case IMAGETYPE_JPEG2000: // For JPEG 2000 images
                return 'image/jp2';
            case IMAGETYPE_GIF:
                return 'image/gif';
            default:
                return false;
        }
    }

    public static function isImage($filePath) {
        $imageInfo = @getimagesize($filePath);
        return $imageInfo !== false;
    }

    public static function getImageWidth($filePath){
        list($width) = @getimagesize($filePath);
        return $width??null;
    }

    public static function getImageHeight($filePath){
        list($height) = @getimagesize($filePath);
        return $height??null;
    }
}