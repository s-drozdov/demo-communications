<?php

use yii\web\Response;
use yii\web\JsonParser;
use yii\web\UrlNormalizer;
use yii\web\JsonResponseFormatter;

$common = require __DIR__ . '/common.php';

return yii\helpers\ArrayHelper::merge($common, [
    'id' => 'demo-communications-api',
    'defaultRoute' => 'site/index',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'XCJo7bNwVdmjHHNm5TS_DtLMjwSKcxZT',
            'parsers' => [
                'application/json' => JsonParser::class,
            ],
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'formatters' => [
                Response::FORMAT_JSON => [
                    'class' => JsonResponseFormatter::class,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => UrlNormalizer::class,
                'collapseSlashes' => false,
                'action' => null,
            ],
        ],
    ],
    'controllerNamespace' => 'app\src\infrastructure\controllers',
]);