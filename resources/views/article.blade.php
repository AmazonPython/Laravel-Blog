<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }} -- Slug Home</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/css/background.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="48x48" href="{{ url('/images/favicon.jpg') }}">
</head>
<body class="article-img">
<div id="content" style="padding: 50px;">

    <button class="btn-lg" onclick="history.go(-1)">
        < Back
    </button>

    <h1 style="text-align: center; margin-top: 50px;">{{ $article->title }}</h1><hr>

    <div id="date" style="text-align: right;">
        {{ $article->updated_at }}
    </div>

    <div id="content" style="margin: 20px;">
        <p class="article">{!! $article->content !!}</p>
    </div>

    <div id="comments" style="margin-top: 50px;">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Operation failed!</strong> Input does not meet the requirements.<br><br>
                {!! implode('<br>', $errors->all()) !!}
            </div>
        @endif

        <div id="new">
            <form action="{{ url('comment') }}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <div class="form-group">
                    <label>Nickname</label>
                    <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" style="width: 300px;">
                </div>
                <div class="form-group">
                    <label>Home page</label>
                    <input type="text" name="website" class="form-control" style="width: 300px;">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
                </div>
                <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
            </form>
        </div>

        <script>
            function reply(a) {
                var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
                var textArea = document.getElementById('newFormContent');
                textArea.innerHTML = '@'+nickname+' ';
            }
        </script>

        <div class="comments" style="margin-top: 100px;">
            @foreach ($article->hasManyComments as $comment)

                <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                    <div class="nickname" data="{{ $comment->nickname }}">
                        <h3>{{ $comment->nickname }}</h3>
                        <h6>{{ $comment->created_at }}</h6>
                        <h6><a href="{{ ('http://' . $comment->website) }}">web: {{ $comment->website }}</a></h6>
                    </div>

                    <div class="content">
                        <p style="padding: 20px;">
                            {{ $comment->content }}
                        </p>
                    </div>

                    <div class="reply" style="text-align: right; padding: 5px;">
                        <a href="#new" onclick="reply(this);">Reply</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
