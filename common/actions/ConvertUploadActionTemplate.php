<?php

namespace common\actions;

use common\components\filekit\src\actions\UploadAction;
use Yii;

class ConvertUploadActionTemplate extends UploadAction
{
    public function run()
    {
        $response = parent::run();
        $files = [];

        $ffmpegPath = env('FFMPEG_FULL_PATH');

        foreach ($response['files'] as $file) {
            $filePath = Yii::getAlias('@storageSource') . '/' . $file['path'];
            $pi = pathinfo($filePath);
            $piSubDir = pathinfo($file['path']);
            $delete_url = explode('?', $file['delete_url'])[0];

            if (file_exists($filePath)) {
                if (in_array(strtolower($pi['extension']), ['mp3', 'wav'])) {
                    try {
                        $destinationOggPath = $pi['dirname'] . '/' . $pi['filename'] . '.ogg';
                        $command = "$ffmpegPath -i " . escapeshellarg($filePath) . " " . escapeshellarg($destinationOggPath);
                        exec($command . ' 2>&1', $output, $returnVar);

                        if ($returnVar === 0 && file_exists($destinationOggPath)) {
                            unlink($filePath);

                            $files['files'][] = [
                                'name' => $pi['filename'] . '.ogg',
                                'type' => 'audio/ogg',
                                'size' => filesize($destinationOggPath),
                                'base_url' => $file['base_url'],
                                'path' => $piSubDir['dirname'] . '/' . $pi['filename'] . '.ogg',
                                'url' => $file['base_url'] . '/' . $piSubDir['dirname'] . '/' . $pi['filename'] . '.ogg',
                                'delete_url' => $delete_url . '?path=' . $piSubDir['dirname'] . '/' . $pi['filename'] . '.ogg',
                            ];
                        } else {
                            $files['files'][] = $file;
                        }
                    } catch (\Exception $e) {
                        Yii::error($e->getMessage(), __METHOD__);
                        $files['files'][] = $file;
                    }
                } else {
                    $files['files'][] = $file;
                }
            } else {
                $files['files'][] = $file;
            }
        }

        return $files;
    }

}
