<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    // public $password; 
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username', 'email'], 'string', 'max' => 255],
            ['email', 'email'],
            // ['username', 'unique'],
            // ['email', 'unique'],
            ['password', 'string', 'min' => 6], // Example validation rule for the password
        ];
    }

    // Other methods and properties of the User model
}
