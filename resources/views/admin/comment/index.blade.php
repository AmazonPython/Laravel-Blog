@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <h4><a href="{{ url('admin') }}"><< 返回后台管理首页</a></h4>
                    <div class="panel-heading">评论管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        @foreach ($comments as $comment)

                        <div class="article">
                            <h2 style="text-align: center; ">{{ $comment->nickname }}</h2>

                            <div class="content">
                                <h5>{{ $comment->content }}</h5>
                                <p>
                                    <a href="{{ ('/article/' . $comment->article_id) }}">文章评论链接</a>
                                    &nbsp&nbsp&nbsp&nbsp{{ $comment->updated_at }}
                                </p>
                            </div>
                        </div>
                    </div>

                            <form action="{{ url('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        @endforeach
                            <hr>
                            {{ $comments->links() }}{{--分页链接--}}
                    </div>
                </div>
            </div>
        </div>
@endsection
