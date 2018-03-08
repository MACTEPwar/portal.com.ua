<?php
/**
 * Created by PhpStorm.
 * User: shebanits
 * Date: 08.03.2018
 * Time: 2:54
 */

namespace app\models;


use yii\db\Query;

class MailIdentity extends Mail
{
    public static function findGroup($id)
    {
        $query = "select * from mail u where (u.date = (select max(u2.date)from mail u2 where u2.all_user = u.all_user)) and (u.sender like ".$id." or u.recipient like ".$id.")";
        //$query = "select * from mail";
        //Static::find()->select()
        return Static::findBySql($query)->all();
    }
}