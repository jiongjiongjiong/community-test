<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Community App</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
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
                <a class="navbar-brand" href="#">Community App</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">首页</a><iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../navbar/">登 录</a></li>
                    <li class="active"><a href="/user/register">注 册<span class="sr-only">(current)</span></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    @yield('content')
    </body>
</html>