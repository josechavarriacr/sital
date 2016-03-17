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
 * @property integer $codTarifas
 * @property boolean $estado
 *
 * @property TblTarifas $codTarifas0
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
        [['codigo', 'nombre', 'empresa', 'correo', 'telefono', 'codTarifas'], 'required', 'message' => 'No se aceptan campos en vacios.'],
        [['codigo', 'codTarifas'], 'integer'],
        [['estado'], 'boolean'],
        [['correo'], 'email','message'=>'Correo inválido'],
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
        'codTarifas' => 'Código Tarifas',
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
