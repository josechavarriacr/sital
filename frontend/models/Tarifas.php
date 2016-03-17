<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_tarifas".
 *
 * @property integer $codigo
 * @property string $nombre
 * @property integer $tiempo
 * @property string $precio
 * @property boolean $estado
 *
 * @property TblClientes[] $tblClientes
 * @property TblFeriados[] $tblFeriados
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
            [['nombre', 'tiempo', 'precio'], 'required'],
            [['tiempo'], 'integer'],
            [['precio'], 'number'],
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
            'tiempo' => 'Tiempo',
            'precio' => 'Precio',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblClientes()
    {
        return $this->hasMany(TblClientes::className(), ['codTarifas' => 'codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblFeriados()
    {
        return $this->hasMany(TblFeriados::className(), ['codTarifas' => 'codigo']);
    }
}
