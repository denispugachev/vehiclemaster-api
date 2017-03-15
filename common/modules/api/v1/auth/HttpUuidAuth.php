<?php

namespace common\modules\api\v1\auth;

use yii\filters\auth\AuthMethod;

/**
 * Класс аутентификации по UUIDv4.
 */
class HttpUuidAuth extends AuthMethod
{
    /** @inheritdoc */
    public function authenticate($user, $request, $response)
    {
        $authHeader = $request->getHeaders()->get('Authorization');
        $preg = '/^UUID\s+([0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12})$/';
        if ($authHeader !== null && preg_match($preg, $authHeader, $matches)) {
            $identity = $user->loginByAccessToken($matches[1], get_class($this));
            if ($identity === null) {
                $this->handleFailure($response);
            }
            return $identity;
        }

        return null;
    }
}