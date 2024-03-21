<?php

namespace app\src\infrastructure\controllers;

use Yii;
use yii\filters\Cors;
use yii\web\Response;
use yii\rest\Controller;
use yii\filters\ContentNegotiator;

abstract class ApiController extends Controller
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        $behaviors['corsFilter'] = Cors::class;
        return $behaviors;
    }

    protected function verbs(): array
    {
        return [
            '*' => ['GET', 'HEAD', 'OPTIONS'],
        ];
    }

    public function actionOptions(): Response
    {
        if (mb_strtolower(Yii::$app->getRequest()->getMethod()) !== 'options') {
            Yii::$app->getResponse()->setStatusCode(405);
        }

        $options = $this->verbs()['*'];
        $response = Yii::$app->getResponse();
        $response->getHeaders()
            ->set('Allow', implode(', ', $options));
        return $response;
    }

    public function actionIndex(): array|string
    {
        return 'api';
    }

    public function actionAlive(): array
    {
        return [
            'isAlive' => true,
        ];
    }
}
