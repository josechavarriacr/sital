<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_feriados".
 *
 * @property integer $codigo
 * @property string $nombre
 * @property string $fechas
 * @property integer $codTarifas
 * @property boolean $estado
 *
 * @property TblTarifas $codTarifas0
 */
class Feriados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_feriados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'fechas', 'codTarifas'], 'required', 'message' => 'No se aceptan campos en vacios.'],
            [['fechas'], 'safe'],
            [['codTarifas'], 'integer'],
            [['estado'], 'boolean'],
            [['nombre'], 'string', 'max' => 50]
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
            'fechas' => 'Fechas',
            'codTarifas' => 'Cod Tarifas',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodTarifas0()
    {
        return $this->hasOne(TblTarifas::className(), ['codigo' => 'codTarifas']);
    }
}
