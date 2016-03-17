<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_tarifas".
 *
 * @property integer $codigo
 * @property integer $codCliente
 * @property integer $codFeriado
 * @property integer $codTroncal
 * @property integer $tiempo
 * @property string $precio
 * @property boolean $estado
 *
 * @property TblClientes $codCliente0
 * @property TblFeriados $codFeriado0
 * @property TblTroncales $codTroncal0
 */
class Tarifas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tarifas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codCliente', 'codFeriado', 'codTroncal', 'tiempo', 'precio'], 'required'],
            [['codigo', 'codCliente', 'codFeriado', 'codTroncal', 'tiempo'], 'integer'],
            [['precio'], 'number'],
            [['estado'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'codCliente' => 'Cliente',
            'codFeriado' => 'Feriado',
            'codTroncal' => 'Troncal',
            'tiempo' => 'Tiempo',
            'precio' => 'Precio',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodCliente0()
    {
        return $this->hasOne(TblClientes::className(), ['codigo' => 'codCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodFeriado0()
    {
        return $this->hasOne(TblFeriados::className(), ['codigo' => 'codFeriado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodTroncal0()
    {
        return $this->hasOne(TblTroncales::className(), ['codigo' => 'codTroncal']);
    }
}
