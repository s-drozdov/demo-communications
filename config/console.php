<?php

$common = require __DIR__ . '/common.php';

$config = yii\helpers\ArrayHelper::merge($common, [
    'id' => 'demo-communications-console',
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@tests' => '@app/tests',
    ],
]);

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
