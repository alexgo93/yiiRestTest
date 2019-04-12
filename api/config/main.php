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
        'country' => [
            'basePath' => '@app/modules/country',
            'class'    => 'api\modules\country\Module',
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
            //'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session'      => [
            // this is the name of the session cookie used for login on the api
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
                '/hello' => 'country/countries/hello',

                [
                    'class'         => 'yii\rest\UrlRule',
                    'controller'    => 'country/countries',
                    'extraPatterns' => [
                        'GET test/<code:\d+>' => 'test',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',

                    'controller' => 'country/countries',

                    'tokens' => [

                        '{code}' => '<code:\\w+>',

                    ],

                ],
            ],
        ],
    ],
    'params'              => $params,
];
