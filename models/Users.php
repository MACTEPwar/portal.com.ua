<?php
/**
 * Created by PhpStorm.
 * User: shebanits
 * Date: 06.03.2018
 * Time: 1:52
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Users extends  ActiveRecord implements \yii\web\IdentityInterface
{
    private static $users;

    public static $id;
    public static $username;
    public static $password;
    public static $authKey;
    public static $accessToken;

    public static function findByUsername($u_name)
    {
        self::$users =  self::find()->orderBy('id')->all();

        foreach (self::$users as $user)
        {
            if (strcasecmp($user->username, $u_name) === 0) {
                self::$password = $user->password;
                self::$id = $user->id;
                self::$username = $user->username;
                self::$authKey = $user->authKey;
                self::$accessToken = $user->accessToken;
                return new static($user);
            }
        }
    }
    public function validatePassword($password)
    {
        //echo $this->password;
        return  $this->password === $password;

    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return isset(self::$users->id) ? new static(self::$users->id) : null;
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user->accessToken === self::$token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return self::$id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return self::$authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return self::$authKey === $authKey;
    }
}