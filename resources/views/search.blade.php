<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slug Home</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/css/background.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="48x48" href="{{ url('/images/favicon.jpg') }}">
</head>
<body class="article-img">
<div id="title" style="text-align: center;">
    <h2>The slug found {{ $counts }} results.</h2>
</div>

<div id="content" style="padding: 50px;">
    <h3><a href="/"><button>< Back</button></a></h3>
    @if($articles->isNotEmpty())
        <ul>
        @foreach ($articles as $article)
            <li>
                <h1 style="text-align: center; margin-top: 50px;">
                    <a href="{{ url('article/' . $article->id .'-'. str_replace(' ', '-', $article->title)) }}" target="_blank">
                        {{ $article->title }}
                    </a>
                </h1><hr>

                <div id="date" style="text-align: right;">
                    {{ $article->updated_at }}
                </div>

                <div id="content" style="margin: 20px;">
                    <p class="article">{{ $article->content }}</p>
                </div>
            </li>
        @endforeach
            {{ $articles->links() }}
        </ul>
    @else
        <h1 style="text-align: center; margin-top: 50px;">Article not found</h1>
    @endif
</div>

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--即时预加载--}}
<script src="//instant.page/5.1.0" type="module" integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>
</body>
</html>
