<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model

{

    public $name;

    public $login;

    public $password;

    public function rules()

    {

        return [

            [['name','login','password'], 'required'],

            ['login','email'],

            [['name','login','password'], 'string'],

            [['login'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'login']

        ];

    }

    public function signup()

    {

        if($this->validate())

        {

            $user = new User();

            $user->attributes = $this->attributes;

            return $user->create();

        }

    }

}