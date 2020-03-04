<?php
/**
 * Created by PhpStorm.
 * User: БайназарС
 * Date: 21.02.2020
 * Time: 16:01
 */

namespace Models;


use Core\_Apstracts\Model;
use Core\Password;

class Users extends Model
{
    protected static $table = 'users';

    static function make(string $username, string $password): bool{
        $where = ['username' => $username];
        if (self::has($where)) {
            throw new \Exception('username already exists');
        }
        self::insert([
            'username' => $username,
            'password_hash' => Password::hash($password)
        ]);

        return self::has($where);
    }
}