@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="/css/black.css">
    <link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection

@section("child-content")
<!-- 内容-->
<div class="content">
    <div class="top-cont">
        <div class="big-img"></div>
        <div class="right-nav">
            <ul>
                @foreach($images as $m)
                <a target="_blank" href="{{$m->link}}"><li data-url="/upload/{{$m->url}}"><img src="img/banner-page.png" alt=""/>{{$m->tips}}</li></a>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="btm-cont">
        <h2>关于 <span>黑特斯</span></h2>
        <div class="left-list">
            <ul>
                @foreach($articles as $a)
                <li>
                    <i></i>
                    <p>{{$a->title}}</p>
                    <span>{{$a->created_at}}</span>
                </li>
                @endforeach
            </ul>
            {{$articles->links()}}
        </div>

        <div class="right-img">
            <ul>
                @foreach($thumbs as $t)
                <li style="background: url('/upload/{{$t->url}}') center">
                    <div class="sha">
                        {{$t->tips}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script>

$(".big-img").css("background-image","url("+$(".right-nav ul li").data("url")+")");
$(".right-nav ul li").hover(function(){
    var backImage = $(this).data("url");
    $(".big-img").css("background-image","url("+backImage+")");
})
</script>
@endsection