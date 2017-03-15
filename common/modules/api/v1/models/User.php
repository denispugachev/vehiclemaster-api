<?php

namespace common\modules\api\v1\models;

use yii\base\Component;
use yii\web\IdentityInterface;

/**
 * Класс пользователя. Фактически требуется для хранения идентификаторов сессий на внешних сервисах.
 */
class User extends Component implements IdentityInterface
{
    /** @inheritdoc */
    public static function findIdentity($id)
    {
        return new static;
    }

    /** @inheritdoc */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return new static;
    }

    /** @inheritdoc */
    public function getId()
    {
        return 1;
    }

    /** @inheritdoc */
    public function getAuthKey()
    {
        return null;
    }

    /** @inheritdoc */
    public function validateAuthKey($authKey)
    {
        return false;
    }
}