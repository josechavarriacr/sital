<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_extensiones".
 *
 * @property integer $codigo
 * @property integer $numero
 * @property boolean $estado
 *
 * @property TblUsuarios[] $tblUsuarios
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
            [['codigo', 'numero'], 'required'],
            [['codigo', 'numero'], 'integer'],
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
            'numero' => 'Numero',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblUsuarios()
    {
        return $this->hasMany(TblUsuarios::className(), ['codExtension' => 'codigo']);
    }
}
