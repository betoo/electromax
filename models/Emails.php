<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property integer $id
 * @property string $reciver_name
 * @property string $reciver_email
 * @property string $content
 * @property string $attachment
 * @property string $subject
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reciver_name', 'reciver_email', 'content', 'subject'], 'required'],
            [['content'], 'string'],
            [['reciver_name'], 'string', 'max' => 50],
            [['reciver_email'], 'string', 'max' => 200],
            [['attachment', 'subject'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reciver_name' => 'Reciver Name',
            'reciver_email' => 'Reciver Email',
            'content' => 'Content',
            'attachment' => 'Attachment',
            'subject' => 'Subject',
            'file' => 'Logo'
        ];
    }
}

