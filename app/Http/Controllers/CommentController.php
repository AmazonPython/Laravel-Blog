<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;

class CommentController extends Controller
{
    //发布评论
    public function store(Request $request)
    {
        if (Comment::create($request->all())) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }

    //回复评论
    public function reply()
    {

    }
}
