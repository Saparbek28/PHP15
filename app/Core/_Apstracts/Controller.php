<?php
/**
 * Created by PhpStorm.
 * User: БайназарС
 * Date: 18.02.2020
 * Time: 17:12
 */

namespace Core\_Apstracts;


use Core\_Interfaces\IController;

abstract class Controller implements  IController
{

    public function  render($template, array $vars = [])
    {
        return view($template,$vars);
    }
}