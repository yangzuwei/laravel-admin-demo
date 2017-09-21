@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="/css/tribal.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content">
    <ul>
        @foreach($all as $a)
        <a target="_blank" href="user_detail/{{$a->appuser->id}}">
            <li>
                <div class="jl-phone" style="background: url({{isset($a->slogan->cover_img) ? '/upload/'.$a->slogan->cover_img : $a->appuser->icon }}) center center">

                </div>
                <div class="head-img">
                    <div class="img-cont">
                        <img src="{{$a->appuser->icon}}" alt="">
                    </div>
                    <b>{{$a->appuser->nick}}</b>
                    <p>头衔：运动员  2阶段 <img src="@if($a->appuser->sex==1)/img/male.png @else /img/female.png @endif" alt=""></p>
                </div>

            </li>
        </a>
        @endforeach
    </ul>
</div>

@endsection