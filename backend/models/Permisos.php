<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_rolpermisos".
 *
 * @property integer $codigo
 * @property integer $codRoll
 * @property string $modulo
 * @property boolean $ver
 * @property boolean $crear
 * @property boolean $modificar
 * @property boolean $eliminar
 * @property boolean $estado
 *
 * @property TblRoles $codRoll0
 */
class Permisos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_rolpermisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codRoll', 'modulo'], 'required'],
            [['codigo', 'codRoll'], 'integer'],
            [['ver', 'crear', 'modificar', 'eliminar', 'estado'], 'boolean'],
            [['modulo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'codRoll' => 'Roll',
            'modulo' => 'Modulo',
            'ver' => 'Ver',
            'crear' => 'Crear',
            'modificar' => 'Modificar',
            'eliminar' => 'Eliminar',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodRoll0()
    {
        return $this->hasOne(TblRoles::className(), ['codigo' => 'codRoll']);
    }
}
