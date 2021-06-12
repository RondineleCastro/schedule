<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $name;
    public $perfil;
    public $matricula;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // ['username', 'trim'],
            // ['username', 'required'],
            // ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            // ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este e-mail já conta em nossa base de dados.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 3, 'max' => 255],

            ['matricula', 'trim'],
            ['matricula', 'required'],
            ['matricula', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Esta matrícula já consta em nossa base de dados.'],
            ['matricula', 'string', 'min' => 5, 'max' => 20],

            ['perfil', 'required'],
            ['perfil', 'string', 'min' => 5],            
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nome',
            'matricula' => 'Matrícula',
            'perfil' => 'Perfil',
            'email' => 'e-mail',
            'password' => 'Senha'
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
        $user->username = $this->email;
        $user->email = $this->email;

        $user->matricula = $this->matricula;
        $user->name = $this->name;
        $user->perfil = $this->perfil;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    public function getListPerfil()
    {
        return [
            'Aluno' => 'Aluno',
            'Coordenador' => 'Coordenador',
            'Administrador' => 'Administrador',
        ];
    }
}
