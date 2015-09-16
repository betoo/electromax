<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio".
 *
 * @property integer $ser_id
 * @property string $ser_servicio
 * @property string $ser_imagen
 * @property integer $empresa_emp_id
 * @property string $serviciocol
 *
 * @property Empresa $empresaEmp
 */
class Servicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empresa_emp_id'], 'integer'],
            [['serviciocol'], 'string'],
            [['ser_servicio'], 'string', 'max' => 45],
            [['ser_imagen'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ser_id' => 'ID',
            'ser_servicio' => 'Servicio',
            'ser_imagen' => ' Imagen',
            'empresa_emp_id' => 'Empresa ID',
            'serviciocol' => 'Descripción',
        ];
    }


     public function servicio($id)
    {
        return $this->find()
            ->where(['id' => 123])
            ->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaEmp()
    {
        return $this->hasOne(Empresa::className(), ['emp_id' => 'empresa_emp_id']);
    }
}
