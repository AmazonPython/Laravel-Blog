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
    <link rel="stylesheet" type="text/css" href="{{ url('/css/swiper.min.css') }}">
    <style>
        .swiper-container{
            width: 67%;
            height: 40%;
        }
        .swiper-slide img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body id="about_me">
<div id="title">
    <h1 style="text-align: center;">About me</h1><hr>
    <h3 style="padding-right: 50%;"><a href="/"><button>< Back</button></a></h3>
</div>

<!--轮播图-->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/NyanCat.jpg') }}" width="420" height="263">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/cheetah.jpg') }}" width="480" height="300">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/lions.jpg') }}" width="480" height="270">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/FourCats.jpg') }}" width="640" height="360">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/FocalFossa.jpg') }}" width="480" height="300">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/CheshireCat.jpg') }}" width="480" height="270">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/CloudLion.jpg') }}" width="512" height="341">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/Cat&Fish.jpg') }}" width="640" height="400">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/cats.jpg') }}" width="480" height="270">
        </div>
        <div class="swiper-slide">
            <img src="{{ url('/images/cats/Nekomusume.png') }}" width="480" height="270">
        </div>
    </div>
</div>

<div id="home_tips">
    <p>
        Hi, everyone. This is Nova, Welcome to my website. Hope my article brings you happiness.
    </p>
    <p>
        I was born in a small town in China, I spent my childhood there. My current occupation is a programmer.
    </p>
    <p>
        It came to me in a flash of inspiration, Then I wrote this website with slugs as mascots.
        If they don’t live in my vegetables, sometimes they are cute.
    </p>
    <br />
</div>

<p style="text-align: center"><font color="4d004c">Design by: Nova<br />Development based on Laravel</font></p>

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('/js/swiper.min.js') }}"></script>
<script type="text/javascript">
    // cover flow是类似于苹果将多首歌曲的封面以3D界面的形式显示出来的方式。coverflow效果参数，可选值：
    // rotate：slide做3d旋转时Y轴的旋转角度。默认50。
    // stretch：每个slide之间的拉伸值，越大slide靠得越紧。 默认0。
    // depth：slide的位置深度。值越大z轴距离越远，看起来越小。 默认100。
    // modifier：depth和rotate和stretch的倍率，相当于depth*modifier、rotate*modifier、stretch*modifier，值越大这三个参数的效果越明显。默认1。
    // slideShadows：开启slide阴影。默认 true。
    var mySwiper = new Swiper ('.swiper-container', {
        loop: true, // 循环模式选项
        // slide的切换效果，默认为"slide"（位移切换），可设置为'slide'（普通切换、默认）,"fade"（淡入）"cube"（方块）"coverflow"（3d流）"flip"（3d翻转）。
        effect: 'coverflow',
        slidesPerView: 2,// 设置slider容器能够同时显示的slides数量(carousel模式)
        centeredSlides: true, // 设定为true时，active slide会居中，而不是默认状态下的居左。
        coverflowEffect: {
            rotate: 15,
            stretch: 70, // 指的时后面一张图片被前一张图片遮挡的部分
            depth: 160, // 图片缩小的部分
            modifier: 2
        }
    })
</script>
</body>
</html>