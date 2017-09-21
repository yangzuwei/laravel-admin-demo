@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="/css/many-details.css">
    <link rel="stylesheet" type="text/css" href="/css/touchTouch.css">
    <link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content">
    <div class="left-cont">
        <div class="top">
            <div class="top-c">
                <div class="head">
                    <img src="{{$genius->icon}}" alt=""/>
                </div>
                <div class="name">
                    <h5><img src="@if($genius->sex==1)/img/male.png @else /img/female.png @endif" alt=""/>{{$genius->nick}}</h5>
                    <p>
                        <span>身高：{{$genius->height}}cm</span>
                        <span>体重：{{$genius->weight}}kg</span>
                        <span>体重：68kg</span>
                    </p>
                </div>
                <div class="code">
                    <img src="{{ $qrcode }}" alt=""/>
                </div>
            </div>
        </div>
        <div class="dt-list">
            <ul>
                @foreach($stories as $s)
                <li>
                    <p>{{$s->title?:'主人很懒，啥都没说'}}</p>
                        @if(count($s->images)==1)
                        <div class="big-img exc2">
                            <div class="list">
                                <dl>
                                    @foreach($s->images as $img)
                                        <dd style="background: url({{$img}}) center center"><a href="{{$img}}"></a></dd>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                        @else
                        <div class="exc2">
                            <div class="list">
                                <dl>
                                    @foreach($s->images as $img)
                                        <dd style="background: url({{$img}}) center center"><a href="{{$img}}"></a></dd>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                        @endif
                    <div class="time">
                        {{$s->create_date}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        {{$stories->links('vendor.pagination.sigpage')}}
    </div>

    <div class="right-cont">
        @include('common.genius_list')
    </div>

</div>

<script src="/js/touchTouch.jquery.js"></script>
<script src="/js/pub.js"></script>
<script>
$(function(){
    $(".exc2 .list").each(function(){
        $(this).find("a").touchTouch();
    });
})
</script>

@endsection