<?php

namespace common\modules\api\v1\controllers;

/**
 * Контроллер информации о залоге.
 */
class PledgeController extends BaseController
{
    /** @inheritdoc */
    protected function verbs()
    {
        return [
            'view' => ['get'],
        ];
    }

    /**
     * Отдает информацию о залоге по VIN номеру т/с.
     *
     * @param string $vin
     */
    public function actionView($vin)
    {

    }
}