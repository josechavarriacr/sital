<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_troncales".
 *
 * @property integer $codigo
 * @property string $nombre
 * @property string $descripcion
 * @property boolean $estado
 *
 * @property TblTarifas[] $tblTarifas
 */
class Troncales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_troncales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'descripcion'], 'required'],
            [['codigo'], 'integer'],
            [['estado'], 'boolean'],
            [['nombre', 'descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblTarifas()
    {
        return $this->hasMany(TblTarifas::className(), ['codTroncal' => 'codigo']);
    }
}
