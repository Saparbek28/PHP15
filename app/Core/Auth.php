<?php
/**
 * Created by PhpStorm.
 * User: БайназарС
 * Date: 21.02.2020
 * Time: 16:24
 */

namespace Core;


use Models\Users;

final class Auth
{
    private function __construct(){

    }

    static function check(): bool{
        return self::getUser() !== null;
    }

    static function getUser(){
        if(!$cookie = Cookie::get('auth')){
            return null;
        }

        return Users::get('*',[
            'auth_token' => $cookie
        ]);
    }

    static function login($username,$password){
       $where = ['username' => $username];

       $user = Users::get('*',$where);
        if(!$user){
            return false;
        }
        if(!Password::verify($password,$user['password_hash'])){
            return false;
        }
        $token = self::generateToken();
        Cookie::set('auth', $token, time()+ 60*60*24*365);
        Users::update([
            'auth_token' => $token
        ],$where);

        return Users::has([
            'auth_token' =>$token
        ]);
    }

    static function logout(){
        if(!self::check()){
            return true;
        }
        $cookie = Cookie::get('auth');
        Cookie::set('auth', null, time() - 1);
        Users::update([
            'auth_token' => null
        ], [
            'auth_token' =>$cookie
        ]);

        return true;
    }

    static function generateToken(): string{
        return md5(hexdec(uniqid()));
    }
}