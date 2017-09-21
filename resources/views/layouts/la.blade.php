<html>
<head>
    <title>应用程序名称 - @yield('title')</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@section('sidebar')
    这是 master 的侧边栏。
@show

<div class="container">
    这个是内容
    @yield('content')
</div>
</body>
</html>