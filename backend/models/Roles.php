<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_roles".
 *
 * @property integer $codigo
 * @property string $rol
 * @property string $descripcion
 * @property boolean $estado
 *
 * @property TblRolpermisos[] $tblRolpermisos
 * @property TblUsuarios[] $tblUsuarios
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'rol', 'descripcion'], 'required'],
            [['codigo'], 'integer'],
            [['estado'], 'boolean'],
            [['rol', 'descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'rol' => 'Rol',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblRolpermisos()
    {
        return $this->hasMany(TblRolpermisos::className(), ['codRoll' => 'codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblUsuarios()
    {
        return $this->hasMany(TblUsuarios::className(), ['codRoll' => 'codigo']);
    }
}
