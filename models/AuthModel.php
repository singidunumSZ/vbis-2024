<?php

namespace app\models;

use app\core\BaseModel;
use app\controllers\UserController;


class AuthModel extends BaseModel
{
    public string $email = '';
    public string $password = '';
    public function tableName() : string
    {
        return 'users';
    }

    public function readColumns(): array
    {
        return [];
    }

    public function editColumns(): array
    {
        return['email', 'password'];
    }



    public function validationRules():array
    {
        return[
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED],

        ];
    }
}