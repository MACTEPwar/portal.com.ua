<?php
/**
 * Created by PhpStorm.
 * User: shebanits
 * Date: 07.03.2018
 * Time: 2:26
 */

namespace app\models;

use Yii;
use yii\base\Model;


class RegistrationForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username','password'],'required'],
            ['username','unique','targetClass' => 'app\models\User'],
            ['password','string','min' => 8, 'max' => 20],
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = md5($this->password);
        $user->authKey = $this->generateKey();
        $user->accessToken = md5(mt_rand(1000000000,9999999999));
        return $user->save();
    }

    private function generateKey()
    {
        $key = '';
        $array = array_merge(range('A','Z'),range('a','z'),range('0','9'));
        $c = count($array);
        for($i=0;$i<10;$i++) {$key .= $array[rand(0,$c)];}
        return $key;
    }
}