<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/*
 * Article类和当前控制器类不在一个命名空间路径下，不能直接调用,导入\App\Article类
 * use App\Article = ->withArticles(\App\Article::all())
 */
use App\Article;
use think\response\Redirect;

class ArticleController extends Controller
{
    //显示文章后台管理页
    public function index()
    {
        //withArticles(Article::all()); 加载Article模型
        return view('admin/article/index')->withArticles(Article::all());
    }

    //展示创建文章的表单
    public function create()
    {
        return view('admin/article/create');
    }

    //插入新数据至数据库  Laravel的依赖注入系统会自动初始化必要的Request类
    public function store(Request $request)
    {
        $this->validate($request, [
            //必填：在articles表中唯一、最大长度30
            'title' => 'required|unique:articles|max:60',
            'content' => 'required',//必填
        ]);

        //通过Article Model插入一条数据进articles表
        $article = new Article;//初始化Article对象

        //将POST提交过的title字段的值赋给articles表的title属性
        $article->title = $request->get('title');
        $article->content = $request->get('content');//同上

        //获取当前Auth系统中注册的用户，并将其id赋给articles表的user_id属性
        $article->user_id = $request->user()->id;

        //将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($article->save()){
            return redirect('admin/articles');//保存成功，跳转到文章管理页
        }else{
            //保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    //展示编辑某一篇文章的表单
    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    //上传数据至数据库更新选中文章
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //传入更新字段和ID
            'title' => 'required|unique:articles,title,'.$id.'|max:60',
            'content' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->content = $request->get('content');

        if ($article->save()){
            return redirect('admin/articles');
        }else{

            return redirect()->back()->withInput()->withErrors('编辑失败！');
        }
    }

    //删除选中文章
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}