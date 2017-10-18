<!DOCTYPE html>
<html lang="zh" ng-app="xiaohu" user-id="{{\Illuminate\Support\Facades\Auth::id()}}">
<head>
    <meta charset="utf-8">
    <title>晓呼</title>
    <link rel="stylesheet" href="node_modules/normalize-css/normalize.css">
    <link rel="stylesheet" href="css/base.css">
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="js/base.js"></script>
    <script src="js/common.js"></script>
    <script src="js/user.js"></script>
    <script src="js/question.js"></script>
    <script src="js/answer.js"></script>
</head>
<body>
<div class="navbar claerfix">
    <div class="container">
        <div class="fl">
            <div class="navbar-item logo" ui-sref="home">晓乎</div>
            <div class="navbar-item">
                <form id="quick_ask" ng-controller="QuestionAddController" ng-submit="Question.go_add_question()">
                    <div class="navbar-item">
                        <input type="text" ng-model="Question.new_question.title">
                    </div>
                    <div class="navbar-item">
                        <button>提问</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="fr">
            <a class="navbar-item" ui-sref="home">首页</a>
            @if(\Illuminate\Support\Facades\Auth::check())
                <a class="navbar-item"
                   ui-sref="login">{{\Illuminate\Support\Facades\Auth::guard()->user()->username}}</a>
                <a href="{{url('api/logout')}}">登出</a>
            @else
                <a class="navbar-item" ui-sref="login">登录</a>
                <a class="navbar-item" ui-sref="signup">注册</a>
            @endif
        </div>
    </div>
</div>
<div class="page">
    <div ui-view>

    </div>
</div>
</body>

</html>