<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id'                  => 'app-api',
    'basePath'            => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap'           => ['log'],
    'modules'             => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class'    => 'api\modules\v1\Module',
        ],
    ],
    'aliases'             => [
        '@api' => dirname(dirname(__DIR__)) . '/api',
    ],
    'components'          => [
        'request'      => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'response'     => [
            'format' => \yii\web\Response::FORMAT_JSON,
        ],
        'user'         => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => false,
            'enableSession'   => false,
        ],
        'session'      => [
            'name' => 'advanced-api',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'   => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
            'rules'               => [

                [
                    'class'         => 'yii\rest\UrlRule',
                    'controller'    => 'v1/countries',
                    'extraPatterns' => [
                        'GET test/<code:\d+>'   => 'test',
                        'GET cities/<code:\w+>' => 'cities',
                        //'POST update/<id:\d+>'   => 'update',
                    ],
                ],
                [
                    'class'         => 'yii\rest\UrlRule',
                    'controller'    => 'v1/cities',
                    'extraPatterns' => [
                        'GET capital/<countryId:\d+>' => 'capital',
                    ],
                ],
            ],
        ],
    ],
    'params'              => $params,
];
