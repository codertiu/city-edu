<?php
return [
    'timeZone' => 'UTC',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    //'language' => 'uz-UZ',
    //'sourceLanguage' => 'uz-UZ',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'lang' => [
            'class' => 'common\components\Language',
        ],
        'i18n' => [
            'translations' => [
                'main*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage'=>'en',
                    //'fileMap' => [
                    //  'app' => 'app.php',
                    //],
                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'on missingTranslation' => ['common\components\TranslationEventHandler', 'handleMissingTranslation']// обработчик не найденных переводов
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'php:m-d-Y',
            'datetimeFormat' => 'php:m-d-Y H:i',
            'timeZone' => '	Asia/Tashkent',
            'defaultTimeZone' => 'UTC',
        ],
    ],

];
