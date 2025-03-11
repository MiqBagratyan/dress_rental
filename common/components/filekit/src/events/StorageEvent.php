<?php

namespace common\components\filekit\src\events;

use yii\base\Event;

/**
 * Class StorageEvent
 * @package trntv\filekit\events
 * @author Eugene Terentev <eugene@terentev.net>
 */
class StorageEvent extends Event
{
    /**
     * @var \League\Flysystem\FilesystemInterface
     */
    public $filesystem;
    /**
     * @var string
     */
    public $path;
}
