@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="/css/buy-product.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content">
    <h4>{{$content->title}}</h4>
    {{--<div class="buy">--}}
        {{--<a href="#">功能详解</a>--}}
        {{--<button>立即购买</button>--}}
    {{--</div>--}}
</div>

<!-- 列表-->
<div class="list">
    <ul>
        @foreach($content->pictures as $img)
            <li><img src="/upload/{{$img}}" alt=""/></li>
        @endforeach
    </ul>
</div>


@endsection