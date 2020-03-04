<?php
/**
 * Created by PhpStorm.
 * User: БайназарС
 * Date: 21.02.2020
 * Time: 16:08
 */

namespace Core;


final class Cookie
{
    private function __construct(){

    }
    static function set($name, $value = null, $expire = null, $secure = null, $httponly = null){
        setcookie(md5($name), $value, $expire, "/", "", $secure, $httponly);
    }
    static function get($key){
        return $_COOKIE[md5($key)] ?? null;
    }
}