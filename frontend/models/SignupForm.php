<?php
namespace frontend\models;

use common\models\User;
use frontend\models\Authassignment;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $id;
    public $nombre;
    public $permissions;
    public $estado;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['id', 'required', 'message' => 'No se aceptan campos en vacios.'],
            ['nombre','required', 'message' => 'No se aceptan campos en vacios.'],
            ['username', 'required', 'message' => 'No se aceptan campos en vacios.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nombre de usuario ya se encuentra en uso.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required' , 'message' => 'No se aceptan campos en vacios.'],
            ['email', 'email', 'message' => 'Dirección de email invalida.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este correo electrónico ya se encuentra en uso.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['estado', 'boolean'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->id=$this->id;
            $user->nombre=$this->nombre;
            $user->username = $this->username;
            $user->setPassword($this->password);
            $user->email = $this->email;
            $user->estado = $this->estado;
            $user->generateAuthKey();
            // if ($user->save()) {
            //     return $user;
            // }
            $user->save();

            //add permissions
            $permissionList = $_POST['SignupForm']['permissions'];

            foreach ($permissionList as $value) {
                $newPermission = new Authassignment;
                $newPermission->user_id = $user->id;
                $newPermission->item_name=$value;
                $newPermission->save(); 
                // print_r($newPermission);
                // die();
             } 
             return $user;
        }

        return null;
    }
}
