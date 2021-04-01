@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <h4><a href="{{ url('admin') }}"><< 返回后台管理首页</a></h4>
                    <div class="panel-heading">新增一篇文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/articles') }}" method="POST">
                            {!! csrf_field() !!}
                            <!--上行代码生成一个隐藏的input：<input type="hidden" name="_token" value="随机字符串">-->
                            <!--上行代码等同于<input type="hidden" name="_token" value="大括号大括号csrf_field()大括号大括号">-->
                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                            <br>
                            <textarea name="content" id="image-tools" rows="10" class="form-control" required="required" placeholder="请输入内容"></textarea>
                            <br>
                            <button class="btn btn-lg btn-info">新增文章</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
