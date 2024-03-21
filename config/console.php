<?php

$common = require __DIR__ . '/common.php';

$config = yii\helpers\ArrayHelper::merge($common, [
    'id' => getenv('APP_NAME') . '-console',
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@tests' => '@app/tests',
    ],
]);

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
