@extends("layouts.home")

@section('page-css')
    <link rel="stylesheet" type="text/css" href="/css/all-activity.css">
@endsection

@section("child-content")
<!-- 内容-->
<div class="content">
    <div class="class">
        <ul>
            <a href="/activity"><li class=@if($current_type == 0)"act"@endif>全部</li></a>
            @foreach($types as $t)
                @if($current_type == $t->id && $current_type!=0)
                    <a href="/activity/{{$t->id}}"><li class="act">{{$t->sport_cate_name}}</li></a>
                @else
                    <a href="/activity/{{$t->id}}"><li>{{$t->sport_cate_name}}</li></a>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="list">
        <ul>
        @foreach($activities as $a)
            <li>
                <a target="_blank" href="/activity_detail/{{$a->id}}">
                <div class="img-cont" style="background: url({{$a->image}}) center center">
                    <i class="jb bmz">
                        {{$status[$a->status]}}
                    </i>
                    <div class="sha">
                        <s>行悦部落</s>
                        <p>
                        @if($a->slogan == null)
                            共享行悦 互动同行，大家一起来加入我们的户外家庭吧
                        @else
                            {{$a->slogan->personal_slogan}}
                        @endif
                        </p>
                    </div>
                </div>
                <span>活动名称: {{$a->title}}</span>
                <p>关键词: 互动安全互动安全互动安全互动安全互动安全</p>
                </a>
            </li>
        @endforeach
        </ul>
    </div>
    {{$activities->links()}}

</div>

@endsection