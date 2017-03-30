<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Community App</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.Jcrop.css">
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.Jcrop.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Community App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">首页</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" id="dLabel"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" >
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel" >
                            <li><a href="/user/avatar"> <i class="fa fa-user"></i> 更换头像</a></li>
                            <li><a href="#"> <i class="fa fa-cog"></i> 更换密码</a></li>
                            <li><a href="#"> <i class="fa fa-heart"></i> 特别感谢</a></li>
                            <li role="separator" class="divider"></li>
                            <li> <a href="/logout">  <i class="fa fa-sign-out"></i> 退出登录</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ Auth::user()->avatar }}" class="img-circle" width="50" alt="">
                    </li>
                @else
                    <li><a href="/user/login">登 录</a></li>
                    <li class="active"><a href="/user/register">注 册<span class="sr-only">(current)</span></a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
@yield('content')
@include('footer')

</body>
</html>