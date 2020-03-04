<?php
/**
 * Created by PhpStorm.
 * User: ���������
 * Date: 18.02.2020
 * Time: 18:02
 */

namespace Core\_Apstracts;


use Core\Db;

/*
 * Class Model
 * @package Core/_Apstracts;
 *
 * @method static select( $join, $columns = null, $where = null);
 * @method static insert( $datas);
 * @method static update( $data, $where = null);
 * @method static delete( $where);
 * @method static  replace( $columns, $where = null);
 * @method static get( $join = null, $columns = null, $where = null);
 * @method static has( $join, $where = null);
 * @method static rand( $join = null, $columns = null, $where = null);
 * @method static count( $join = null, $column = null, $where = null);
 * @method static avg( $join, $column = null, $where = null);
 * @method static max( $join, $column = null, $where = null);
 * @method static min( $join, $column = null, $where = null);
 * @method static sum( $join, $column = null, $where = null);
 * */
abstract class Model
{
    protected static $table;

    public static function table(){
        return static::$table;
    }

    public  static function __callStatic($name,$arguments){
        array_unshift($arguments,static::$table);
        return call_user_func_array([Db::inst(),$name],$arguments);
    }



}