<ul>
    @foreach($stories as $s)
    <li>
        <div class="head">
            <img src="{{$s->appuser->icon}}" alt=""/>
        </div>
        <div class="name">
            <img src="@if($s->appuser->sex==1)/img/male.png @else /img/female.png @endif" alt=""/>{{$s->appuser->nick}}
        </div>
        <p>{{$s->content}}</p>
        <div class="exc2">
            <div class="list">
                <dl>
                    @if($s->images != '')
                        @foreach(json_decode($s->images) as $im)
                            <dd >
                                <a style="background: url({{$im}}) center center" href="{{$im}}"></a>
                            </dd>
                        @endforeach
                    @endif
                </dl>
            </div>
        </div>
    </li>
    @endforeach
</ul>

