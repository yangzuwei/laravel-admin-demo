
<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 模板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/test.css" rel="stylesheet">
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1>Hello, world!</h1>
{{--<img src="/images/demo/bg-main.jpg" class="img-responsive" alt="响应式图像">--}}
<div class="table-responsive">
    <p>Bootstrap 提供了一个清晰的创建表格的布局。下表列出了 Bootstrap 支持的一些表格元素：</p>
    <table class="table table-hover table-bordered">
        <tbody><tr><th>标签</th><th>描述</th></tr>
        <tr><td>&lt;table&gt;</td><td>为表格添加基础样式。</td></tr>
        <tr><td>&lt;thead&gt;</td><td>表格标题行的容器元素（&lt;tr&gt;），用来标识表格列。</td></tr>
        <tr><td>&lt;tbody&gt;</td><td>表格主体中的表格行的容器元素（&lt;tr&gt;）。</td></tr>
        <tr><td>&lt;tr&gt;</td><td>一组出现在单行上的表格单元格的容器元素（&lt;td&gt; 或 &lt;th&gt;）。</td></tr>
        <tr><td>&lt;td&gt;</td><td>默认的表格单元格。</td></tr>
        <tr><td>&lt;th&gt;</td><td>特殊的表格单元格，用来标识列或行（取决于范围和位置）。必须在 &lt;thead&gt; 内使用。</td></tr>
        <tr><td>&lt;caption&gt;</td><td>关于表格存储内容的描述或总结。</td></tr>
        </tbody></table>
</div>
<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- 包括所有已编译的插件 -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
