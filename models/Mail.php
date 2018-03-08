<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mail".
 *
 * @property int $id
 * @property int $sender
 * @property int $recipient
 * @property string $content
 * @property string $date
 * @property string $all_user
 */
class Mail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender', 'recipient', 'date', 'all_user'], 'required'],
            [['sender', 'recipient'], 'integer'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['all_user'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender' => 'Sender',
            'recipient' => 'Recipient',
            'content' => 'Content',
            'date' => 'Date',
            'all_user' => 'All User',
        ];
    }

}
