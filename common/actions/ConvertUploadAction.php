<?php
/**
 * Author: ChatGPT
 */

namespace common\actions;

use common\components\filekit\src\actions\UploadAction;
use Yii;
use common\components\Helper;

class ConvertUploadAction extends UploadAction
{
    public function run()
    {
        $response = parent::run();
        $files = [];
        foreach ($response['files'] as $file){
            $filePath = Yii::getAlias('@storageSource') .'/'. $file['path'];
            if (file_exists($filePath) and Helper::isImage($filePath) and Helper::getImageType($filePath) != 'image/webp'){
                $pi = pathinfo($filePath);
                $piSubDir = pathinfo($file['path']);
                $delete_url = explode('?',$file['delete_url'])[0];
                try{
                    // Load the source image
                    $sourceImage = imagecreatefromstring(file_get_contents($filePath));
                    // Path to the destination WebP file
                    $destinationWebpPath = $pi['dirname'].'/'.$pi['filename'].'.webp';
                    // Convert and save the image to WebP format
                    imagewebp($sourceImage, $destinationWebpPath);
                    // Free up memory
                    imagedestroy($sourceImage);
                    unlink($filePath);
                    $files['files'][] = [
                        'name' => $pi['filename'].'.webp',
                        'type' => Helper::getImageType($destinationWebpPath),
                        'size' => filesize($destinationWebpPath),
                        'base_url' => $file['base_url'],
                        'path' => $piSubDir['dirname'].'/'.$pi['filename'].'.webp',
                        'url' => $file['base_url'].'/'.$piSubDir['dirname'].'/'.$pi['filename'].'.webp',
                        'delete_url' => $delete_url.'?path='.$piSubDir['dirname'].'/'.$pi['filename'].'.webp',
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
