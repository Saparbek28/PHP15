<?php
/**
 * Created by PhpStorm.
 * User: БайназарС
 * Date: 21.02.2020
 * Time: 16:04
 */

namespace Core;


final class Password
{
    private function __construct(){

    }

    public static function hash(string $password): string{
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verify(string $password, string $hash):bool{
        return password_verify($password, $hash);
    }
}