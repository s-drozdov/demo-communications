<?php

namespace app\src\infrastructure\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return ['message' => 'site controller response'];
    }
}
