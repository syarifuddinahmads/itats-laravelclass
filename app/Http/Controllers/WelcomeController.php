<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index($id=null){
        $view = 'articleDetail';
        if($id == null){
            $article = Article::with('user')->paginate(12);
            $view = 'welcome';
        }else{
            $article = Article::with('user')->find($id);
        }
        return view($view,['articles' => $article]);
    }


    public function welcome(){
        $articles = Article::paginate(10);
        return view('welcome', ['articles'=> $articles]);
    }

}
