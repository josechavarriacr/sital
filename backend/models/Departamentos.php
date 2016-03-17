<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_departamentos".
 *
 * @property integer $codigo
 * @property integer $codUsuario
 * @property string $nombreDepartamento
 * @property boolean $estado
 *
 * @property TblUsuarios $codUsuario0
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_departamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codUsuario', 'nombreDepartamento'], 'required'],
            [['codigo', 'codUsuario'], 'integer'],
            [['estado'], 'boolean'],
            [['nombreDepartamento'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'codUsuario' => 'Usuario',
            'nombreDepartamento' => 'Nombre Departamento',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodUsuario0()
    {
        return $this->hasOne(TblUsuarios::className(), ['codigo' => 'codUsuario']);
    }
}
