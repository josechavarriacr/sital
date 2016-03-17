<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_feriados".
 *
 * @property integer $codigo
 * @property string $fechas
 * @property string $descripcion
 * @property boolean $estado
 *
 * @property TblTarifas[] $tblTarifas
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
            [['codigo', 'fechas', 'descripcion'], 'required'],
            [['codigo'], 'integer'],
            [['fechas'], 'safe'],
            [['estado'], 'boolean'],
            [['descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'fechas' => 'Fechas',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblTarifas()
    {
        return $this->hasMany(TblTarifas::className(), ['codFeriado' => 'codigo']);
    }
}
