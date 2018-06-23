<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'uz',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'lang' => [
            'class' => 'common\components\Language',
        ],
    ],

];
