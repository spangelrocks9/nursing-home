<?php
$basePath = dirname(__DIR__);
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/params.php'
);

return [
    'id' => APP_BACKEND_ID,
    'name' => APP,
    'basePath' => $basePath,
    'controllerNamespace' => 'backend\controllers',
    'homeUrl' => APP_BACKEND,
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'redactor' => [
           'class' => 'yii\redactor\RedactorModule',
           'uploadDir' => '@webroot/uploads',
           'uploadUrl' => '@web/uploads',
           // 'uploadDir' => 'uploads',
           // 'uploadUrl' => 'uploads',
           'imageAllowExtensions'=>['jpg','png','gif','doc','docx','pdf','xls','xlsx','ppt']
        ],
        'rights' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'user_id', // id field of model User
                    'usernameField' => 'username', // username field of model User
                ],
            ],
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'nhfm-backend',
        ],
        'request' => [
            'baseUrl' => APP_BACKEND,
            'csrfParam' => '_nhfm_csrf',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3ZTZyNAEFxgUmMtedHsNkL0pa7bD1yok',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'basePath'=>'@webroot/assets',
            'baseUrl'=>'@web/assets',
            'bundles' => [
                'yii\jui\JuiAsset' => [
                    'css' => [
                        'themes/redmond/jquery-ui.css',
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ]
        ], 
    ],
    'params' => $params,
];
