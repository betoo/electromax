<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property integer $id
 * @property string $reciver_name
 * @property string $reciver_email
 * @property string $content
 * @property string $attachment
 * @property string $subject
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reciver_name', 'reciver_email', 'content',  'subject'], 'required'],
            [['reciver_email',], 'email'],
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
            'reciver_name' => 'Nombre',
            'reciver_email' => 'Email',
            'subject' => 'Asunto',
            'content' => 'Contenido',
            'phone' => 'Teléfono',
            'attachment' => 'Adjunto',
        ];
    }
}
