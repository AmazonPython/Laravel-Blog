<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slug Home</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/css/background.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="48x48" href="{{ url('/images/favicon.jpg') }}">
</head>

<body id="home">
<div id="title" style="text-align: center;">
    <h1>Slugs want a hug</h1>
    <a class="about_me" href="{{ url('/about') }}"><button>About me</button></a>
    <div id="home_tips">
        <p>
            <span class="tips-img">
                <font color="#E80000">
                Tips1: First thing in the morning, you can usually see a glistening trail
                of slime on stems or leaves that have been visited by slugs or snails. 😆
                </font>
            </span>
            <img src="{{ url('/images/BoogieWipes.png') }}" class="tips-img tips-list" style="margin-right: -30%;" alt="">
        </p>
        <p>
            <font color="DE9401">
                Tips2: Slugs like a dark and humid environment. why? If it's too hot and too dry,
                the soft slugs will be dehydrated and sun-dried into dry slugs. >_<
            </font>
        </p>
        <p>
            <font color="2ACA04">
                Tips3: They can't carry the house on their backs like their relative snails,
                strolling around in the daytime, too hot to hide in shells. 😢
            </font>
        </p>
        <p>
            <font color="684ADE">
                Tips4: They are children of the moon,
                and they are destined to be unable to walk hand in hand under the sun in their lives. 💔
            </font>
        </p>
    </div>
</div>

<div id="content">
    <ul>
        @foreach ($articles as $article)
            <li id="home_content" style="margin: 50px 0;">
                <div class="title">
                    <img src="{{ url('/images/TitleSlug.png') }}" class="title-img title-list" width="128px" height="128px" alt="">
                    <span class="title-img">
                    <a href="{{ url('article/'.$article->id) }}">
                        <h3>{{ $article->title }}</h3>
                    </a>
                    </span>
                </div>
                <div class="body">
                    <p>{{ $article->content }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<p style="text-align: center">Design by: Nova<br />Development based on Laravel</p>

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>