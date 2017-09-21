@extends("layouts.home")

@section('page-css')
    <link rel="stylesheet" type="text/css" href="/css/account-management.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content">
    <div class="plan1">
        <div class="headimg">
            <div class="img-cont">
                <img src="{{ Auth::user()->icon }}" alt=""/>
            </div>
        </div>
        <ul class="info-list">
            <li>
                <span>昵称：</span><i>{{Auth::user()->nick}}</i>
                <div class="rdiv">
                    <button>保存</button>
                    <img src="img/tribal-page.png" alt=""/>
                </div>
            </li>
            <li>
                <span>账号：</span><i>{{ Auth::user()->user_name }} （手机注册）</i>
                <div class="rdiv">
                    <b>更换账号</b>
                    <img src="img/tribal-page.png" alt=""/>
                </div>
            </li>
            {{--<li>--}}
                {{--<span>密码：</span><i class="psw">·····</i>--}}
                {{--<div class="rdiv">--}}
                    {{--<b>修改密码</b>--}}
                    {{--<img src="img/tribal-page.png" alt=""/>--}}
                {{--</div>--}}
            {{--</li>--}}
        </ul>
        {{--<div class="psw-cont">--}}
            {{--<ul>--}}
                {{--<li>--}}
                    {{--<span>旧密码</span>--}}
                    {{--<input type="text" placeholder="请输入"/>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<span>新密码</span>--}}
                    {{--<input type="text" placeholder="请输入"/>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<span>再输入新密码</span>--}}
                    {{--<input type="text" placeholder="请输入"/>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<button>确 定</button>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
    <div class="plan2">
        <div class="left-cont">
            <div class="cont">
                <div class="jl-phone">
                    <img src="/upload/{{$slogan->cover_img or ''}}" alt="" id="cover_img"/>
                </div>
                <div class="head-img">
                    <div class="img-cont">
                        <img src="{{ Auth::user()->icon }}" alt=""/>
                        <form method="post" id="cover_img_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" class="upinput" name="cover_img"/>
                        </form>
                    </div>
                    <b>{{str_limit(strip_tags(Auth::user()->nick), $limit = 18, $end = '...')}}</b>
                    <p>头衔：教练  2阶段 <img src="@if(Auth::user()->sex==1)/img/male.png @else /img/female.png @endif" alt=""/></p>
                </div>
            </div>
            <button class="upbtn">更改背景图</button>
            <p>添加背景图可以使自己的排序提前（电脑端）</p>
        </div>

        <div class="right-cont">

            <div class="head">
                <img src="{{ Auth::user()->icon }}" alt=""/>
                <i>
                    {{$slogan->personal_slogan  or ''}}
                </i>
            </div>

            <div class="shur">
                <p>自己的个性签名</p>
                <form method="post" id="personal_slogan">
                <input type="text" name="personal_slogan" placeholder="修改自己的个性签名，让跟多人了解你" value="{{$slogan->personal_slogan or ''}}"/>
                    {{ csrf_field() }}
                </form>
                <button class="bc">保 存</button>
            </div>

            <div class="shur2">
                <p>行悦部落app活动个性语</p>
                <form method="post" id="horde_slogan">
                    {{ csrf_field() }}
                <input type="text" name="horde_slogan" placeholder="修改自己的个性签名，让跟多人了解你" maxlength="10" value="{{$slogan->horde_slogan or ''}}"/>
                </form>
                <button class="bc">保 存</button>
            </div>

        </div>
    </div>
</div>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/pub.js"></script>
<script>
    //改图

    $(".upbtn").click(function () {
        $(".upinput").click(); //隐藏了input:file样式后，点击头像就可以本地上传
        $(".upinput").on("change",function(){
            var objUrl = getObjectURL(this.files[0]) ; //获取图片的路径，该路径不是图片在本地的路径
            if (objUrl) {
                $("#cover_img").attr("src", objUrl) ; //将图片路径存入src中，显示出图片

                $.ajax({
                    url: '/cover',
                    type: 'POST',
                    cache: false,
                    data: new FormData($('#cover_img_form')[0]),
                    processData: false,
                    contentType: false
                }).done(function(res) {
                    alert('上传成功');
                }).fail(function(res) {
                    alert('上传失败');
                });
            }
        });
    });

    //改签名
    $(".bc").click(function(){
        var slogan = $(this).siblings('form');
        var slogan_name = slogan.attr("id");
        alert(slogan_name);
        $.post(
            "/slogan",
            slogan.serialize(),
            function(data){
                alert("修改成功");
                $('input[name='+slogan_name+']').val(data);
            }
        );
    });

    //建立一個可存取到該file的url
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }

</script>

@endsection
