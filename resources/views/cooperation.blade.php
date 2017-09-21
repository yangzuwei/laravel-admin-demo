@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="/css/business-cooperation.css">
    <link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content">
    <ul>
        @foreach($coop as $m)
        <li>
            <div class="img-cont">
                <img src="/upload/{{$m->url}}" alt=""/>
            </div>
            <div class="txt-cont">
                <h4>{{$m->name}}</h4>
                <a href="/map/{{$m->location}}"><p>地址: {{$m->address}}</p></a>
            </div>
        </li>
        @endforeach
    </ul>

</div>
{{$coop->links()}}
@endsection