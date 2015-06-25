<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Yii2-MongoDB',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ja-JP',
    'timeZone' => 'Asia/Tokyo',
    
    'components' => [
//        'i18n' => [
//            'translations' => [
//                'yii' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@app/messages'
//                ],
//            ],
//        ],
        
        # http://www.yiiframework.com/doc-2.0/guide-output-formatter.html
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'php: Y-m-d H:i:s',
            
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
            
            'nullDisplay' => '',
        ],

        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'SiI_1edQFdZl7eo8vs-mbE83xUoysfYZ',
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        'user' => [
            'identityClass' => 'app\components\User',
            'enableAutoLogin' => true,
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
        #'db' => require(__DIR__ . '/db.php'),

        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            #'dsn' => 'mongodb://用户名:密码@主机地址:端口号/数据库名',
            'dsn' => 'mongodb://yii2:yii2admin@127.0.0.1:27017/yii2',
            # 创建一个对数据库具有读写权限的数据库用户 : 
            # use dbname ; 
            # db.createUser({user: "dbuser", pwd: "dbuseradmin", roles:[{role: "readWrite", db: "dbname"}] })
            # 数据库用户登录 : 
            # mongo dbname -u dbuser -p dbduseradmin
        ],

        'session' => [
            'class' => 'yii\mongodb\Session',
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['192.168.0.80', '127.0.0.1', '::1'],
            // Using the MongoDB DebugPanel
            'panels' => [
                'mongodb' => [
                    'class' => 'yii\mongodb\debug\MongoDbPanel',
                ],
            ],
        ];
    
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'], // adjust this to your needs
            // Using Gii generator With MongoDB
            'generators' => [
                'mongoDbModel' => [
                    'class' => 'yii\mongodb\gii\model\Generator'
                ]
            ],
        ];
}

return $config;
