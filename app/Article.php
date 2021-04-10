<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function hasManyComments()//增加一对多关系的函数
    {
        //return $this->hasMany('App\Comment', 'article_id', 'id');
    }
}
