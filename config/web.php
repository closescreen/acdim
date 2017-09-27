<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
// не работает
//    'as access' => [
//        'class' => 'yii\filters\AccessControl',
//        'except' => ['site/login'],
/*        'rules' => [
            [
                'allow' => false,
                'roles' => ['?'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ]
        ]
*/
//    ],



    'aliases' => [
         '@upload' => __DIR__ . '/../web/uploads',
        ],

    'language' => 'ru-RU',
     
    'id' => 'basic',
//    'name' => 'Автокредитование', не влияет, если не исп в коде
    'on beforeAction' => function ($event) {
        //var_dump(345);
        //exit();
        //if (некоторое условие) {
        //    $event->isValid = false;
        //} else {
        //}
    },    
    // 'on beforeRequest' => function ($event) {
        //var_dump(Yii::$app->user->identity->org_type_id);
        //var_dump( Yii::$app->is_user_org_type_id('admin') );
        //exit;
    //},
    
    'timeZone' => 'Europe/Moscow',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hSYjroJbvS2JQtEJumahF6ir2OJP98SG',
        ],
        // Дима:
	'urlManager' => [
	    // чтоб выключить нужно поднастроить apache
    	    'enablePrettyUrl' => false,
    	    'showScriptName' => true, 
    	],
    	// Дима:
    	'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
    	
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'], 
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
