<!DOCTYPE html>
<html lang="zh" ng-app="xiaohu" user-id="{{\Illuminate\Support\Facades\Auth::id()}}">
<head>
    <meta charset="utf-8">
    <title>晓呼</title>
    <link rel="stylesheet" href="node_modules/normalize-css/normalize.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="icon" href="images/timg.jpg" type="image/jpg">
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="js/base.js"></script>
    <script src="js/common.js"></script>
    <script src="js/user.js"></script>
    <script src="js/question.js"></script>
    <script src="js/answer.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <a href="welcome" class="navbar-brand"><img src="images/timg.jpg" alt="Powered By Jiajian Chan"
                                                        class="logo">
            </a>
            <ul class="nav navbar-nav">
                <li><a href="./">文章</a></li>
                <li><a href="https://pigjian.com/discussion">讨论</a></li>
                <li><a href="https://pigjian.com/share">分享</a></li>
                <li><a href="https://pigjian.com/donate">打赏</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form role="search" method="get" action="https://pigjian.com/search"
                          class="navbar-form navbar-right search"><input type="text" name="q" placeholder="搜索"
                                                                         required="required" class="form-control">
                    </form>
                </li>
                <li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a ui-sref="login">{{\Illuminate\Support\Facades\Auth::guard()->user()->username}}</a>

                </li>
                <li>
                    <a href="{{url('api/logout')}}">登出</a>
                    @else
                </li>
                <li><a ui-sref="login">登录</a></li>
                <li><a ui-sref="signup">注册</a></li>
                @endif

            </ul>
        </div>
    </div>
</nav>
<div class="page">
    <div ui-view>

    </div>
</div>
<footer id="footer" class="footer">
    <div class="container text-center">
        <div class="row content">
            <div class="col-md-4 col-md-offset-4">
                <ul class="connect">
                    <li><a href="https://pigjian.com"><i class="fa fa-home"></i></a></li>
                    <li><a href="https://github.com/jcc" target="_blank"><i
                                    class="fa fa-github"></i></a></li>
                    <li><a href="https://twitter.com/pigjian" target="_blank"><i
                                    class="fa fa-weibo"></i></a></li>
                </ul>
                <div class="links"><a href="https://pigjian.com/link">友情链接</a> <a
                            href="https://pigjian.com/about">关于我</a></div>
                <div class="sponsors">
                    <div class="title">CDN 支持</div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right text-center"><span>© Pig Jian 2016. All rights reserved. </span><a target="_blank"
                                                                                              href="http://www.miitbeian.gov.cn/"
                                                                                              class="item">粤ICP备16020344号-1</a>
    </div>
</footer>
</body>

</html>