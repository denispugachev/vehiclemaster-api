<?php

namespace common\modules\api\v1\controllers;

/**
 * Контроллер капчи.
 */
class CaptchaController extends BaseController
{
    /** @inheritdoc */
    protected function verbs()
    {
        return [
            'index' => ['get'],
        ];
    }

    /**
     * Отдает капчу.
     */
    public function actionIndex()
    {

    }
}