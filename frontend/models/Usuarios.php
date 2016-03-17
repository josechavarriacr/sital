<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_usuarios".
 *
 * @property integer $id
 * @property integer 
 * @property string $nombre
 * @property string $email
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property TblRoles $codRoll0
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre', 'email', 'username', 'password_hash', 'auth_key', 'created_at', 'updated_at'],'required', 'message' => 'No se aceptan campos en vacios.'],
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['email', 'username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['estado'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'estado' => 'Estado',
        ];
    }

}
