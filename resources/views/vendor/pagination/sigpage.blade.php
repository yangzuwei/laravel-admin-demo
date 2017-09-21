@if ($paginator->hasPages())
<div class="page">
    <ul>
    <li>
    {{--@if ($paginator->onFirstPage())--}}
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><li><button>上一页</button></li></a>
    {{--@endif--}}

    <li>
    <dl>

     <dd class="act">{{ $paginator->currentPage() }}</dd>


    </dl>
    </li>

    {{--@if ($paginator->hasMorePages())--}}
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"><button>下一页</button></a>
            <b>共{{ $paginator->lastPage() }}页</b>
        </li>
    {{--@endif--}}

        <li>
            <b>到</b>
            <input id="go_page" type="text" placeholder="页码"/>
            <b>页</b>
        </li>
        <li>
            <button onclick="gopage()">确定</button>
        </li>
    </ul>
</div>
<script>
    function gopage(){
        var page = document.getElementById("go_page").value;
        location.href="?page="+page;
    }
</script>
@endif

