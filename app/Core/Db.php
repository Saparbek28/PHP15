<?php
/**
 * Created by PhpStorm.
 * User: БайназарС
 * Date: 18.02.2020
 * Time: 18:00
 */

namespace Core;


use Medoo\Medoo;

class Db extends  Medoo
{
    private static $inst;

    public function __construct(){
        parent::__construct(config('database'));
    }

    public static function inst(): self{

        if(!self::$inst instanceof self){
            self::$inst = new self();
        }

        return static::$inst;
    }
}