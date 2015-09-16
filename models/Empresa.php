<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $emp_id
 * @property integer $emp_num_cel
 * @property integer $emp_num_tel
 * @property string $emp_mail
 * @property string $emp_nosotros
 * @property string $emp_nombre
 * @property string $emp_galeria
 *
 * @property Servicio[] $servicios
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */


    public function rules()
    {
        return [
            [['emp_num_cel', 'emp_num_tel'], 'integer'],
            [['emp_nosotros'], 'string'],
            [['emp_mail'], 'string', 'max' => 60],
            [['emp_nombre'], 'string', 'max' => 30],
            [['emp_galeria'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'ID',
            'emp_nombre' => 'Nombre',
            'emp_num_cel' => 'Número Celular',
            'emp_num_tel' => 'Número Telefono',
            'emp_mail' => 'E-Mail',
            'emp_facebook'=> 'Facebook',
            'emp_twitter' =>'Twitter',
            'emp_galeria' => 'galeria de imagenes ',
            'emp_nosotros' => 'Nosotros',
        ];
    }


    


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicios()
    {
        return $this->hasMany(Servicio::className(), ['empresa_emp_id' => 'emp_id']);
    }

     public function upload()
    {
        if ($this->validate()) { 
            $files="";
            foreach ($this->emp_galeria as $file) {
                $file->saveAs('attachments/' . $file->baseName . '.' . $file->extension);
                $files.='attachments/' . $file->baseName . '.' . $file->extension;
            }

            return json_encode($files);
        } else {
            return false;
        }
    }
}
