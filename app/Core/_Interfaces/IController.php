<?php
namespace Core\_Interfaces;


interface IController
{
    public function  render($template,array $vars = []);
}