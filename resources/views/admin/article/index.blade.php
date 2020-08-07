@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <h4><a href="{{ url('admin') }}"><< 返回后台管理首页</a></h4>
                    <div class="panel-heading">文章管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{ url('admin/articles/create') }}" class="btn btn-lg btn-primary">新增</a>

                        @foreach ($articles as $article)
                            <hr>
                            <div class="article">
                                <h4>{{ $article->title }}</h4>
                                <div class="content">
                                    <p>
                                        {{ $article->content }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/articles/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/articles/'.$article->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection