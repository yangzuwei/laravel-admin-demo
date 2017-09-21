<div class="cont3">
    <div class="name">
        <span>热门文章</span>
    </div>
    <ul>
        @foreach($hot_articles as $a)
        <a target="_blank" href="/content/{{$a->id}}">
            <li>
                <div class="news-list-img">
                    <img src="/upload/{{$a->thumb}}" alt=""/>
                </div>
                <div class="list-txt">
                    <p>{{$a->title}}</p>
                    <span>发布：{{date('Y.m.d',strtotime($a->created_at))}} </span>
                </div>
            </li>
        </a>
        @endforeach
    </ul>
</div>
