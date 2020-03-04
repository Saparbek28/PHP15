<?php
/**
 * Created by PhpStorm.
 * User: БайназарС
 * Date: 21.02.2020
 * Time: 16:48
 */

namespace Controllers;


use Core\_Apstracts\Controller;
use Core\Auth;
use Klein\Request;
use Klein\Response;
use Models\Users;

class LoginController extends Controller
{
    //Render form view
    function login(Request $request){
        $this->render('login',[
            'title' => 'form in',
            'username' => $request->param('username')
        ]);
    }
    //Validate post params
    function make (Request $request, Response $response){
        $username = $request->param('username');
        $password = $request->param('password');

        $where = ['username' => $username];
        if(!Users::has($where)){
            return $this->redirectOnFail($username,$response);
        }

        if(!Auth::login($username, $password)){
            return $this->redirectOnFail($username,$password);
        }

        return $response->redirect('/');
    }

    private function redirectOnFail($username, Response $response){
        return $response->redirect("/login?username= $username");
    }

    //Logout user if exist
    function  logout(Response $response){
        Auth::logout();
        return $response->redirect('/');
    }
}