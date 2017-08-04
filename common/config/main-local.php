<?php
return [
    'components' => [
        'as beforeRequest' => [
    'class' => 'yii\filters\AccessControl',
    'rules' => [
        [
            'allow' => true,
            'actions' => ['login'],
        ],
        [
            'allow' => true,
            'roles' => ['@'],
        ],
    ],
    'denyCallback' => function () {
        return Yii::$app->response->redirect(['site/login']);
    },
],

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=sitalbd',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,

           /* 'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'legendariospotify@gmail.com',
            'password' => 'cas$q1w2e3r4',
            'port' => '587',
            'encryption' => 'tls',*/

            'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'mail.smartasyst.com',
            'username' => 'jose.chavarria@smartasyst.com',
            'password' => 'cas$q1w2e3r4',
            'port' => '587',
            'encryption' => 'tls',
                        ],
        ],
    ],
];
