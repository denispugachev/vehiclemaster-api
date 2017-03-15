<?php

namespace common\modules\api\v1\controllers;

use yii\rest\Controller;
use yii\web\Response;

/**
 * Базовый класс REST контроллера с переопределенным поведением ContentNegotiator.
 */
class BaseController extends Controller
{
    /** @inheritdoc */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator']['formats'] = [
            'application/json' => Response::FORMAT_JSON,
        ];

        unset($behaviors['rateLimiter']);

        return $behaviors;
    }
}