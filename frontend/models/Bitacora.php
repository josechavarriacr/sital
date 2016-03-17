<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_bitacora".
 *
 * @property integer $codigo
 * @property string $fecha
 * @property string $accion
 * @property string $modulo
 * @property integer $codUsuario
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_bitacora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['accion', 'modulo', 'codUsuario'], 'required'],
            [['codUsuario'], 'integer'],
            [['accion', 'modulo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'fecha' => 'Fecha',
            'accion' => 'Accion',
            'modulo' => 'Modulo',
            'codUsuario' => 'Cod Usuario',
        ];
    }
}
