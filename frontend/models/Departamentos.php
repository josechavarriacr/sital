<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_departamentos".
 *
 * @property integer $codigo
 * @property string $nombreDepartamento
 * @property integer $codExtension
 * @property boolean $estado
 *
 * @property TblExtensiones $codExtension0
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
            [['nombreDepartamento'], 'required', 'message' => 'No se aceptan campos en vacios.'],
            [['codExtension'], 'integer'],
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
            'nombreDepartamento' => 'Nombre Departamento',
            'codExtension' => 'Cod Extension',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodExtension0()
    {
        return $this->hasOne(TblExtensiones::className(), ['codigo' => 'codExtension']);
    }
}
