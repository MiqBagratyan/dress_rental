<?php

namespace common\actions;

use common\components\filekit\src\actions\UploadAction;
use Yii;
use common\components\Helper;

class ConvertUploadBookPngAction extends UploadAction
{
    const IMAGE_TYPES = [
        'image/jpeg',
        'image/jpg',
        'image/png',
    ];

    public function run()
    {
        $response = parent::run();
        $files = [];
        foreach ($response['files'] as $file){
            $filePath = Yii::getAlias('@storageSource') .'/'. $file['path'];

            if (file_exists($filePath) && Helper::isImage($filePath) && !in_array(Helper::getImageType($filePath), self::IMAGE_TYPES)){
                $pi = pathinfo($filePath);
                $piSubDir = pathinfo($file['path']);
                try{
                    // Load the source image
                    $sourceImage = imagecreatefromstring(file_get_contents($filePath));
                    // Path to the destination png file
                    $destinationpngPath = $pi['dirname'].'/'.$pi['filename'].'.png';
                    // Convert and save the image to png format
                    imagepng($sourceImage, $destinationpngPath);
                    // Free up memory
                    imagedestroy($sourceImage);
                    unlink($filePath);
                    $files = [
                        'name' => $pi['filename'].'.png',
                        'location'=> $file['base_url'].'/'.$piSubDir['dirname'].'/'.$pi['filename'].'.png',
                    ];
                }catch (\Exception $e){
                    $files = [
                        'name' => $file['name'],
                        'location'=> $file['url'],
                    ];
                }
            }else{
                $files = [
                    'name' => $file['name'],
                    'location'=> $file['url'],
                ];
            }
        }
        return $files;
    }
}
