<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    //后台评论列表首页
    public function index()
    {
        $comments = Comment::select('id', 'nickname', 'content', 'updated_at', 'article_id')
            ->orderBy('updated_at', 'desc')
            ->paginate(8);

        return view('admin/comment/index', compact('comments'));
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
