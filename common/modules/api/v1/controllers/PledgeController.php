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
     * @return array
     */
    public function actionView($vin)
    {
        return [
            [
                'index' => 1,
                'registerDate' => '27.05.2016',
                'referenceNumber' => '2016-000-227473-491',
                'properties' => [
                    [
                        'prefix' => 'VIN',
                        'value' => 'WVWZZZ16ZDM006260',
                    ]
                ],
                'pledgors' => [
                    [
                        'type' => 'person',
                        'name' => 'Слесарева Лариса Сергеевна',
                        'birth' => '07.05.1968',
                    ]
                ],
                'pledgees' => [
                    [
                        'type' => 'org',
                        'name' => 'Публичное акционерное общество "Акционерный коммерческий банк содействия коммерции и бизнесу"',
                    ]
                ],
                'position' => 0,
                'notificationDataUrl' => '/search/notificationData?pos=0&uuid=a81803d6-3ee1-4a4a-8e5e-ef3ac74840ad',
            ],
            [
                'index' => 2,
                'registerDate' => '29.01.2015',
                'referenceNumber' => '2015-000-287057-363',
                'properties' => [
                    [
                        'prefix' => 'VIN',
                        'value' => 'WVWZZZ16ZDM006260',
                    ]
                ],
                'pledgors' => [
                    [
                        'type' => 'person',
                        'name' => 'Слесарева Лариса Сергеевна',
                        'birth' => '07.05.1968',
                    ]
                ],
                'pledgees' => [
                    [
                        'type' => 'org',
                        'name' => 'Открытое акционерное общество «Сбербанк России»',
                    ]
                ],
                'position' => 1,
                'notificationDataUrl' => '/search/notificationData?pos=1&uuid=a81803d6-3ee1-4a4a-8e5e-ef3ac74840ad',
            ]
        ];
    }
}