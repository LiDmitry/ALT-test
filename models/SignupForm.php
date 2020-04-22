<?php

namespace app\models;
use yii\base\Model;

class SignupForm extends Model{

    public $username;
    public $password;
    public $name;
    public $lastname;
    public $phone;
    public $companyname;
    public $iscompany;

    public function rules() {
        return [
            [['username', 'password','name','lastname','phone','companyname','iscompany'], 'required', 'message' => 'Заполните поле'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'lastname' => 'Фамилия',
            'phone' => 'Телефон',
            'companyname' => 'Название предприятия',
            'role' => 'роль',
            'iscompany' => 'Является предприятием',

        ];
    }

}