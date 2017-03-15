<?php

namespace common\modules\api\v1;

use yii\console\Application;

/**
 * Модуль api/v1.
 */
class Module extends \yii\base\Module
{
    /** @inheritdoc */
    public $controllerNamespace = 'common\modules\api\v1\controllers';

    /** @inheritdoc */
    public function init()
    {
        parent::init();

        if (\Yii::$app instanceof Application) {
            $this->controllerNamespace = 'common\modules\api\v1\commands';
        }
    }
}