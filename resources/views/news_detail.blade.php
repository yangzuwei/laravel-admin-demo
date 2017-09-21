@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="/css/news-details.css">
    <!-- share.css -->
    <link rel="stylesheet" href="/css/share.min.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content">
    <div class="left-cont">
        <div class="cont1">
            <h2>{{$article->title}}</h2>
            <span>{{$article->created_at}}发布</span>
            <div style="margin-left: 10px">{!! $article->content !!}</div>
            <div class="share">
                <dl>
                    <dt>一键分享:</dt>
                    <div class="share-component" data-mobile-sites="weibo,qq,qzone,wechat" data-sites="wechat,weibo,qq,qzone" ></div>
                </dl>
            </div>
        </div>
        <!-- 评论-->
        <div class="cont2">
            {{--<div class="name">--}}
                {{--<b>评论</b>--}}
                {{--<p>--}}
                    {{--<span>点赞数：120</span>--}}
                    {{--<i>评论数：20</i>--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<ul>--}}
                {{--@foreach($comments as $c)--}}
                {{--<li>--}}
                    {{--<div class="com1">--}}
                        {{--<div class="headImg">--}}
                            {{--<img src="{{$c->appuser->icon}}" alt=""/>--}}
                        {{--</div>--}}
                        {{--<h4>--}}
                            {{--<span>{{$c->appuser->nick}}</span>--}}
                            {{--<span class="time">{{$c->created_at}}</span>--}}
                        {{--</h4>--}}
                        {{--<p>{{$c->content}}</p>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--@endforeach--}}
                {{--<li>--}}
                    {{--<div class="com1">--}}
                        {{--<div class="headImg">--}}
                            {{--<img src="img/comment-head.png" alt=""/>--}}
                        {{--</div>--}}
                        {{--<h4>--}}
                            {{--<span>苍月空结姐</span>--}}
                            {{--<span class="time">2017.03.22  08:32</span>--}}
                            {{--<a href="#">回复</a>--}}
                        {{--</h4>--}}
                        {{--<p>双手速度发货速度飞快哈萨克领导讲话送到了房间啊睡觉离开水电开发合适的空间就开始到付款十分深刻的积分还是的空间发挥时代科技粉红色的空间客户说的废话谁的空间发挥时代科技粉红丝带会计法</p>--}}
                    {{--</div>--}}
                    {{--<div class="com2">--}}
                        {{--<dl>--}}
                            {{--<dd><span>kk mrter：</span>十分大的撒实现的方式水岸府邸斯蒂芬森速度发撒的风格说过时代发生地方水电费1谁的风格时代发生的广</dd>--}}
                            {{--<dd><span>匿名（小兔兔）：</span>十分大的撒实现的方式水岸府邸斯蒂芬森速度发撒的风格说过时代发生地方水电费1谁的风格时代发生的广</dd>--}}
                            {{--<dd><span>我回复匿名（小兔兔）：</span>十分大的撒实现的方式水岸府邸斯蒂芬森速度发撒的风格说过时代发生地方水电费1谁的风格时代发生的广</dd>--}}
                            {{--<dd><span>kk回复匿名（小兔兔）：</span>十分大的撒实现的方式水岸府邸斯蒂芬森速度发撒的风格说过时代发生地方水电费1谁的风格时代发生的广</dd>--}}
                        {{--</dl>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<div class="com1">--}}
                        {{--<div class="headImg">--}}
                            {{--<img src="img/comment-head-2.png" alt=""/>--}}
                        {{--</div>--}}
                        {{--<h4>--}}
                            {{--<span>匿名：小兔兔</span>--}}
                            {{--<span class="time">2017.03.22  08:32</span>--}}
                            {{--<a href="#">回复</a>--}}
                        {{--</h4>--}}
                        {{--<p>双手速度发货速度飞快哈萨克领导讲话送到了房间啊睡觉离开水电开发合适的空间就开始到付款十分深刻的积分还是的空间发挥时代科技粉红色的空间客户说的废话谁的空间发挥时代科技粉红丝带会计法</p>--}}
                    {{--</div>--}}
                    {{--<div class="shur">--}}
                        {{--<textarea placeholder="请输入回复的内容"></textarea>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<div class="page">--}}
                {{--<ul>--}}
                    {{--<li class="act">1</li>--}}
                    {{--<li>2</li>--}}
                    {{--<li>3</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="right-cont">
        {{--@include('common.video_list')--}}

        @include('common.genius_list')

        @include('common.article_list')
    </div>
    <!-- share.js -->
    <script src="/js/social-share.min.js"></script>
</div>