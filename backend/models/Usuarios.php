<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_usuarios".
 *
 * @property integer $codigo
 * @property integer $codRoll
 * @property integer $codExtension
 * @property string $nombre
 * @property string $correo
 * @property string $contrasena
 * @property boolean $estado
 *
 * @property TblDepartamentos[] $tblDepartamentos
 * @property TblRoles $codRoll0
 * @property TblExtensiones $codExtension0
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codRoll', 'codExtension', 'nombre', 'correo', 'contrasena'], 'required'],
            [['codigo', 'codRoll', 'codExtension'], 'integer'],
            [['estado'], 'boolean'],
            [['nombre', 'correo', 'contrasena'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'codRoll' => 'Rol',
            'codExtension' => 'Extension',
            'nombre' => 'Nombre',
            'correo' => 'Correo',
            'contrasena' => 'Contrasena',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDepartamentos()
    {
        return $this->hasMany(TblDepartamentos::className(), ['codUsuario' => 'codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodRoll0()
    {
        return $this->hasOne(TblRoles::className(), ['codigo' => 'codRoll']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodExtension0()
    {
        return $this->hasOne(TblExtensiones::className(), ['codigo' => 'codExtension']);
    }
}
