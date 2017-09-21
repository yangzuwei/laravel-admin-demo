@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="/css/news-list.css">
    <!-- share.css -->
    <link rel="stylesheet" href="/css/share.min.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content">
    <div class="left-cont">
         <a href="/news" @if($current_type == 0) class="act" @endif>显示全部</a>
        @foreach($types as $t)
            <a href="/news/{{$t->id}}" @if($current_type == $t->id) class="act" @endif >{{$t->title}}</a>
        @endforeach
        {{--<a href="#">户外类别 <img src="img/tribal-page.png" alt=""/></a>--}}
        {{--<a href="#">吃货介绍</a>--}}
        {{--<a href="#">竞技比赛</a>--}}
        {{--<a href="#">观光介绍</a>--}}
    </div>
    <div class="right-cont">
        <ul class="news-list">
            @foreach($news as $n)
            <a target="_blank" href="/content/{{$n->id}}">
            <li>
                <div class="left-img" style="background: url(/upload/{{$n->image}}) center center">
                </div>
                <div class="right-txt">
                    <h4>{{$n->title}}</h4>
                    <span>发布日期：{{$n->created_at}}  发布者：{{$n->adminuser->name}}</span>
                    <p>{{str_limit(strip_tags($n->content), $limit = 190, $end = '...')}}</p>
                    <a href="#">评论：33</a>
                </div>
            </li>
            </a>
            @endforeach
        </ul>
        {{$news->links()}}
    </div>

</div>
@endsection