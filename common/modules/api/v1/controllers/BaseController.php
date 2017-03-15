<?php

namespace common\modules\api\v1\controllers;

use common\modules\api\v1\auth\HttpUuidAuth;
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

        $behaviors['authenticator']['authMethods'] = [
            HttpUuidAuth::className(),
        ];

        unset($behaviors['rateLimiter']);

        return $behaviors;
    }
}