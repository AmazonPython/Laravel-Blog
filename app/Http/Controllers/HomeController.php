<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth'); 去除强制登录
    }

    //首页，带分页和访客记录功能，使用redis缓存
    public function index()
    {
        //返回home视图并加载Article模型，使用绝对命名空间法加载Article类，->withFooBar(100) = ->with('foo_bar', 100)
        //return view('home')->withArticles(\App\Article::all());
        if (Cache::has('articles'))
        {
            $articles = DB::table('articles')->paginate(8);
            Cache::get('articles', $articles);

            $visits = Redis::incr('visits');
            $data = 'This page has been viewed ' . $visits . ' times';

            return view('home', ['articles' => $articles]) . $data;
        }else{
            $articles = DB::table('articles')->paginate(8);
            Cache::add('articles', $articles, $minutes = 1440);

            $visits = Redis::incr('visits');
            $data = 'This page has been viewed ' . $visits . ' times';

            return view('home', ['articles' => $articles]) . $data;
        }
    }

    //关于页面
    public function about()
    {
        return view('about');
    }
}