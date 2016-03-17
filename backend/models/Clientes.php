<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_clientes".
 *
 * @property integer $codigo
 * @property string $nombre
 * @property string $empresa
 * @property string $correo
 * @property string $telefono
 * @property boolean $estado
 *
 * @property TblTarifas[] $tblTarifas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'empresa', 'correo', 'telefono'], 'required'],
            [['codigo'], 'integer'],
            [['estado'], 'boolean'],
            [['nombre', 'empresa', 'correo', 'telefono'], 'string', 'max' => 50]
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
            'empresa' => 'Empresa',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblTarifas()
    {
        return $this->hasMany(TblTarifas::className(), ['codCliente' => 'codigo']);
    }
}
