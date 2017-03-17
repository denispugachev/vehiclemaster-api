<?php

namespace common\modules\api\v1\models;

use MongoDB\BSON\ObjectID;
use yii\base\Exception;
use yii\mongodb\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Класс пользователя. Фактически требуется для хранения идентификаторов сессий на внешних сервисах.
 *
 * @property ObjectID $_id
 * @property string $uuid
 */
class User extends ActiveRecord implements IdentityInterface
{
    /** @inheritdoc */
    public function attributes()
    {
        return ['_id', 'uuid'];
    }

    /** @inheritdoc */
    public function rules()
    {
        return [
            ['uuid', 'required'],
            ['uuid', 'match', 'pattern' => '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/'],
            ['uuid', 'unique'],
        ];
    }

    /**
     * Пытается найти пользователя по UUID или создает его.
     *
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['uuid' => $id]) ?? static::createUserByUuid($id);
    }

    /**
     * Фактически - это то же самое, что найти пользователя по ID.
     *
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findIdentity($token);
    }

    /** @inheritdoc */
    public function getId()
    {
        return $this->uuid;
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

    /**
     * Создает нового пользователя по UUID.
     *
     * @param string $uuid
     * @return User
     * @throws Exception
     */
    protected static function createUserByUuid($uuid)
    {
        $user = new User([
            'uuid' => $uuid
        ]);

        if ($user->save() === false) {
            throw new Exception('Can\'t create user by UUID');
        }

        return $user;
    }
}