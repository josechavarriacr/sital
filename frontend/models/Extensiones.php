<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_extensiones".
 *
 * @property integer $codigo
 * @property integer $numero
 * @property string $nombre
 * @property boolean $estado
 *
 * @property TblDepartamentos[] $tblDepartamentos
 */
class Extensiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_extensiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'nombre'], 'required', 'message' => 'No se aceptan campos en vacios.'],
            [['numero'], 'integer'],
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
            'numero' => 'Numero',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDepartamentos()
    {
        return $this->hasMany(TblDepartamentos::className(), ['codExtension' => 'codigo']);
    }
}
