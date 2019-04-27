<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
 
    public $username;
    public $email;
    public $password;
    public $person_id;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['person_id', 'safe'],
            ['username', 'trim'],
            ['username', 'required', 'message' => 'El usuario es requerido.'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este usuario ya esta en uso.'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'message' => 'El usuario debe tener mínimo 2 caracteres.'],
            ['email', 'trim'],
            ['email', 'required', 'message' => 'El email es requerido.'],
            ['email', 'email', 'message' => 'Formato inválido.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este correo ya esta en uso.'],
            ['password', 'required', 'message' => 'La contraseña es requerida.'],
            ['password', 'string', 'min' => 6, 'message' => 'La contraseña debe tener al menos 6 caracteres.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Usuario',
            'email' => 'Email',
            'password' => 'Contraseña'
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->person_id = $this->person_id;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
}