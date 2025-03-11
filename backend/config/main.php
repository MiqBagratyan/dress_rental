<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'modules' => [
        'slider' => [
            'class' => 'backend\modules\slider\Module',
        ],
        'work_procedure' => [
            'class' => 'backend\modules\work_procedure\Module',
        ],
        'favourites' => [
            'class' => 'backend\modules\favourites\Module',
        ],
        'community' => [
            'class' => 'backend\modules\community\Module',
        ],
        'counter' => [
            'class' => 'backend\modules\counter\Module',
        ],
        'languages' => [
            'class' => 'backend\modules\languages\Module',
        ],

        'gii' => [
            'class' => yii\gii\Module::class,
            'generators' => [
                'crud' => [
                    'class' => yii\gii\generators\crud\Generator::class,
                    'templates' => [
                        'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates'),
                    ],
                    'template' => 'yii2-starter-kit',
                    'messageCategory' => 'backend',
                ],
                'model' => [
                    'class' => yii\gii\generators\model\Generator::class,
                    'templates' => [
                        'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates'),
                    ],
                    'template' => 'yii2-starter-kit',
                    'messageCategory' => 'backend',
                ],
            ],
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@backend/views',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

    ],
    'params' => $params,
];
