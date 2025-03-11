<?php

namespace backend\modules\files;

/**
 * files module definition class
 */
class FilesModule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\files\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->setModules([
            'file' => [
                'class' => \backend\modules\files\modules\file\Module::class,
            ],
        ]);
    }
}