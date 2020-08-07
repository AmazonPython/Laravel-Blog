<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth'); 去除强制登录
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //首页
    public function index()
    {
        //返回home视图并加载Article模型，使用绝对命名空间法加载Article类，->withFooBar(100) = ->with('foo_bar', 100)
        return view('home')->withArticles(\App\Article::all());
    }

    public function about()
    {
        return view('about');
    }

    public function test()
    {
        Redis::set('name', 'sean');
        $name = Redis::get('name');
        var_dump($name);
    }
}
