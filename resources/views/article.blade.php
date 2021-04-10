<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <a href="{{ url('/') }}">
        <button class="btn-lg">< Back</button>
    </a>

    <h1 style="text-align: center; margin-top: 50px;">{{ $article->title }}</h1><hr>

    <div id="date" style="text-align: right;">
        {{ $article->updated_at }}
    </div>

    <div id="content" style="margin: 20px;">
        <p class="article">{!! $article->content !!}</p>
    </div>

    {{-- 来必力City版安装代码 --}}
    <div id="lv-container" data-id="city" data-uid="{{ env('LIVERE_UID') }}">
        <script type="text/javascript">
            (function(d, s) {
                var j, e = d.getElementsByTagName(s)[0];

                if (typeof LivereTower === 'function') { return; }

                j = d.createElement(s);
                j.src = 'https://cdn-city.livere.com/js/embed.dist.js';
                j.async = true;

                e.parentNode.insertBefore(j, e);
            })(document, 'script');
        </script>
        <noscript>为正常使用来必力评论功能请激活JavaScript</noscript>
    </div>
    {{-- City版安装代码已完成 --}}
</div>

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
