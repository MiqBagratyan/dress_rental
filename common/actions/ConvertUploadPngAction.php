<?php

namespace common\actions;

use common\components\filekit\src\actions\UploadAction;
use Yii;
use common\components\Helper;

class ConvertUploadPngAction extends UploadAction
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
                $delete_url = explode('?',$file['delete_url'])[0];
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
                    $files['files'][] = [
                        'name' => $pi['filename'].'.png',
                        'type' => Helper::getImageType($destinationpngPath),
                        'size' => filesize($destinationpngPath),
                        'base_url' => $file['base_url'],
                        'path' => $piSubDir['dirname'].'/'.$pi['filename'].'.png',
                        'url' => $file['base_url'].'/'.$piSubDir['dirname'].'/'.$pi['filename'].'.png',
                        'delete_url' => $delete_url.'?path='.$piSubDir['dirname'].'/'.$pi['filename'].'.png',
                    ];
                }catch (\Exception $e){
                    $files['files'][] = $file;
                }
            }else{
                $files['files'][] = $file;
            }
        }
        return $files;
    }
}
