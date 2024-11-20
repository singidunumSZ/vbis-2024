<?php
namespace app\models;
use app\core\DbConnection;
use app\core\BaseModel;


class UserModel extends BaseModel
{
    public int $id;

    public string $email = '';
    public string $first_name = '';
    public string $last_name = '';


    public function tableName(): string{
        return "users";
    }

    public function readColumns(): array
    {
        return ["id","first_name", "last_name", "email"];
    }
    public function editColumns(): array
    {
        return ["first_name", "last_name", "email"];
    }


    public function products(): array
    {
        return ["id","name", "description", "price"];
    }

    public function validationRules(): array{
        return[
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "first_name" => [self::RULE_REQUIRED],
            "last_name" => [self::RULE_REQUIRED],
        ];
    }
}