/**
 * Created by Administrator on 2017/8/16.
 */
//    导航固定
$(document).scroll(function(){
    var scroTp=$(document).scrollTop();
    if(scroTp==0){
        $(".header").removeClass("act")
    }else{
        $(".header").addClass("act")
    }
});

//    手机端菜单
$(".phone-menu").click(function(){
    if($(this).next().css("display")=="none"){
        $(this).next().slideDown(150);
    }else{
        $(this).next().slideUp(150);
    }
});


//     所有活动
$(".allhd").hover(function(){
    $(this).find(".xl").slideDown(150)
},function(){
    $(this).find(".xl").slideUp(150)
});

//     二维码
$(".code").hover(function(){
    $(this).find(".xl").slideDown(150)
},function(){
    $(this).find(".xl").slideUp(150)
});


// 登录注册切换
$(".btn button").click(function(){
    $(this).addClass("act").siblings().removeClass("act");
    var btnname=$(this).attr("id").split("btn")[0];
    $(".allcont").fadeOut(0);
    $("."+btnname+"").fadeIn(0);
});

//  登录注册打开
$(".login-btn").click(function(){
    $(".login").slideDown(150);
    $(".shadow").fadeIn(0);
});

$(".enroll-btn").click(function(){
    $(".login").slideDown(150);
    $(".shadow").fadeIn(0);
    $("#enrbtn").click();
});


//  昵称打开
$(".name-btn").click(function(){
    $(".nickname").slideDown(150);
    $(".shadow").fadeIn(0);
});
//  提示打开
$(".tips-btn").click(function(){
    $(".tips").slideDown(150);
    $(".shadow").fadeIn(0);
});

// 关闭
$(".shadow").click(function(){
    $(".shadow").fadeOut(0);
    $(".login").slideUp(150);
    $(".nickname").slideUp(150);
});

$(".tips-qd").click(function(){
    $(".shadow").fadeOut(0);
    $(".tips").slideUp(150);
});

// 点击LOGO到顶部
$("h1").click(function(){
    $("html,body").animate({
        scrollTop:0
    })
});


//评论
var i=0;
$(".yhf").click(function(){
    if(i=="0"){
        $(this).parent().parent().after("<div class='shur'>"+
            "<textarea placeholder='请输入回复的内容'></textarea>"+
            "<button class='qr'>确认</button>"+
            "</div>"
        );
        i=1
    }
    $(".qr").click(function(){
        $(this).parent().fadeOut(0);
        i=0;
    });
});
$(".qr").click(function(){
    $(this).parent().fadeOut(0);
    i=0;
});
$(".com2 dl dd").click(function(){
    if(i=="0"){
        $(this).after("<div class='shur'>"+
            "<textarea placeholder='请输入回复的内容'></textarea>"+
            "<button class='qr'>确认</button>"+
            "</div>"
        );
        i=1
    }
    $(".qr").click(function(){
        $(this).parent().fadeOut(0);
        i=0;
    });
});