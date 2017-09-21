<div class="cont2">
<div class="name">
    <span>牛人推荐</span>
</div>
<ul>
    @foreach($all_genius as $a)
        <li>
            <a target="_blank" href="/user_detail/{{$a->appuser->id}}">
                <div class="head">
                    <img class="nr-head" src="{{$a->appuser->icon}}" alt=""/>
                    <img class="nr-icon" src="/img/lv1.png" alt=""/>
                </div>
                <p class="name-pep"><img src="@if($a->appuser->sex==1)/img/male.png @else /img/female.png @endif" alt=""/>{{$a->appuser->nick}}</p>
                <span>{{$a->story->count()}}篇动态</span>
            </a>
        </li>
    @endforeach
</ul>
</div>