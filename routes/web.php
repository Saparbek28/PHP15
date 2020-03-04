<?php

use Klein\Klein;

/**
 * @var Klein $router
 */

$router->get('/',function( $request, $response){
    return controller('BlogController@index',$request, $response);
});

$router->get('/post', function($request, $response){
    return controller('BlogController@view',$request, $response);
});

if(\Core\Auth::check()){

    $router->with('/create', function() use ($router){
        $router->get('', function(){
            return controller('BlogController@create');
        });

        $router->post('', function($request, $res){
            return controller('BlogController@insert', $request, $res);
        });
    });

    $router->with('/update', function() use ($router){
        $router->get('',function($request, $res){
            return controller('BlogController@update',$request, $res);
        });
        $router->post('', function($request, $res){
            return controller('BlogController@edit',$request, $res);
        });
    });

    $router->get('/delete', function($request, $res){
        return controller( 'BlogController@delete',$request, $res);
    });
    $router->get('/logout', function($request,$res){
        return controller('LoginController@logout',$res);
    });
}

else{
    $router->with('/login',function() use ($router){
        $router->get('', function($res){
            return controller('LoginController@login',$res);
        });

        $router->post('', function ($request, $res){
            return controller('LoginController@make', $request,$res);
        });
    });
}





