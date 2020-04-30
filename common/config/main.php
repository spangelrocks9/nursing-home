<?php
return [
    'name' => APP,
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Kathmandu',
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'nepalidate'=>[
            'class'=>'common\components\NepaliDate',
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    ],
    'aliases' => [ 
         '@bower' => '@vendor/bower-asset', 
         '@npm'   => '@vendor/npm-asset', 
     ],
];
