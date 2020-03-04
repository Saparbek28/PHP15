<?php

namespace Controllers;

use Core\_Apstracts\Controller;
use Klein\Request;
use Klein\Response;
use Models\blog;
class BlogController extends Controller
{

    public function index(){
         $this->render('index',[
            'posts' =>blog::select('*'),
            'title'=>'Главная'
        ]);
    }

    public function view(Request $request, Response $response){
        $post = blog::get('*',[
            'id'=> $request->param('id')
        ]);


        if($post == null){
            return $response->code(404);
        }

        $this->render('post',[
            'post' => $post
        ]);
    }

    public function  create(){
        $this->render('form',[
            'title' =>'создайте новый записи'
        ]);

    }

    public function  insert(Request $request, Response $response){
        $title = $request->param('title');
        $content = $request->param('content');

        $res = blog::insert([
            'title'=> $title,
            'content'=>$content
        ]);

        if($res == false){
            throw new \Exception('post error');
        }

        return $response->redirect('/');
    }

    public function update(Request $request, Response $response){

        $id = $request->param('id');
        $post = blog::get('*',[
           'id' => $request->param('id')
        ]);

        if(!$post){
            return $response->code(404);
        }

        $this->render('form',[
            'title' => 'change text',
            'post'=>$post,
            'action' => 'update'
        ]);
    }

    public function edit(Request $request, Response $response){

        $id = $request->param('id');

       $res = blog::update([
            'title' => $request->param('title'),
            'content' => $request->param('content')
        ],
        [
            'id' => $id
        ]);
        if(!res){
            throw new \Exception('update error');
        }
        $response->redirect("/post?id=$id");
    }

    public function delete(Request $request,Response $response){
        $res = blog::delete([
            'id' => $request->param('id')
        ]);

        if(!$res){
            throw new \Exception('delete error');
        }

        return $response->redirect('/');
    }
}