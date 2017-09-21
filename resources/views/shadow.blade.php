<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>行悦部落</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="css/pub.css">
    <link rel="stylesheet" type="text/css" href="css/popup.css">
    <!--[if lt IE 9]>
    <script type="text/javascript">
        alert("您的浏览器版本太低，为了您的访问顺畅，请更换高版本浏览器！！");
    </script>
    <![endif]-->
</head>
<body>
<button class="login-btn">登录注册</button>
<button class="name-btn">昵称</button>
<button class="tips-btn">提示</button>

<!--遮罩层-->
<div class="shadow"></div>
<!-- 登录注册-->
<div class="login">
    <div class="top">
        <span>行悦部落</span>
        <div class="btn">
            <button id="logbtn" class="act">登录</button>
            <button id="enrbtn">注册</button>
        </div>
    </div>
    <div class="log allcont">
        <ul>
            <li>
                <span><img src="img/user.png" alt=""/></span>
                <input type="text" placeholder="请输入您的账号"/>
            </li>
            <li>
                <span><img src="img/psw.png" alt=""/></span>
                <input type="text" placeholder="请输入您的密码"/>
            </li>
            <li style="border: none">
                <button>登   录</button>
            </li>
        </ul>
        <div class="thr">
            <span>第三方登陆</span>
        </div>
        <dl>
            <dd>
                <img src="img/qq.png" alt=""/>
                <span>qq登录</span>
            </dd>
            <dd>
                <img src="img/we.png" alt=""/>
                <span>微信登录</span>
            </dd>
        </dl>
    </div>
    <div class="enr allcont" >
        <ul>
            <li>
                <span><img src="img/user.png" alt=""/></span>
                <input type="text" placeholder="请输入您的账号"/>
            </li>
            <li>
                <span><img src="img/psw.png" alt=""/></span>
                <input type="text" placeholder="请输入您的密码"/>
            </li>
            <li>
                <span><img src="img/psw.png" alt=""/></span>
                <input type="text" placeholder="请再次密码确认"/>
            </li>
            <li>
                <span><img src="img/eml.png" alt=""/></span>
                <input type="text" placeholder="请输入常用邮箱，便于修改密码"/>
            </li>
            <li class="code">
                <input type="text" placeholder="输入动态验证码"/>
                <div class="num">
                    123456
                </div>
            </li>
            <li style="border: none">
                <button>登   录</button>
            </li>
        </ul>
    </div>
</div>
<!-- 昵称-->
<div class="nickname">
    <div class="top">
        <span>行悦部落</span>
    </div>
    <ul>
        <li>
            <span><img src="img/user.png" alt=""/></span>
            <input type="text" placeholder="请输入您的昵称"/>
            <div class="select">
                <select>
                    <option value="">男</option>
                    <option value="">女</option>
                </select>
            </div>
        </li>
        <li style="border: none">
            <button>确   定</button>
        </li>
    </ul>
</div>
<!-- 提示-->
<div class="tips">
    <div class="top">
        <span>温馨提示</span>
    </div>
    <p>你输入的账号油污阿瑟大时代萨达萨达萨达多少分的说法是否的多少分萨达萨达是的时代发生地方多少分</p>
    <button class="tips-qd">确   定</button>
</div>

</body>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/pub.js"></script>
</html>