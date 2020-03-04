<?php


use Klein\Klein;
use Whoops\Run;
class app
{
    public function __construct(){
        $this->initErrorHandler();
        $this->initRouter();
    }

    private  function initRouter(){
        $router = new Klein();

        $routsBase = config('app.routes.base');
        $dir = path($routsBase);

        if(!file_exists($dir)){
            mkdir($dir);
        }

        $list = scandir($dir);
        $list = array_diff($list, ['.','..']);
        foreach($list as $file){
            $path = path('routes', $file);
            $info = pathinfo($path);

            if($info['extension'] == 'php'){
                include_once $path;
            }
        }

        $router->dispatch();
    }

    private  function initErrorHandler(){
        $debug = config('app.debug') === true;

        ini_set('display_errors', $debug);
        error_reporting((E_ALL ^ E_NOTICE) * $debug);
        if($debug){
            $whoops = new Run();
            $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler());
            $whoops -> register();
        }
    }

}