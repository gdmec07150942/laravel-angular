<!DOCTYPE html>
<html lang="zh" ng-app="xiaohu">
<head>
    <meta charset="utf-8">
    <title>晓呼</title>
    <link rel="stylesheet" href="node_modules/normalize-css/normalize.css">
    <link rel="stylesheet" href="css/base.css">
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="js/base.js"></script>
</head>
<body>
<div class="navbar claerfix">
    <div class="container">
        <div class="fl">
            <div class="navbar-item logo">晓乎</div>
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
<script type="text/ng-template" id="home.tpl">
    <div class="home card container">
        <h1>最新动态</h1>
        <div class="hr"></div>
        <div class="item-set">
            <div class="item">
                <div class="vote"></div>
                <div class="feed-item-content">
                    <div class="content-act">xx赞同了该回答</div>
                    <div class="title">哪个瞬间让你突然觉得读书有用？</div>
                    <div class="content-owner">王华华 <span class="desc">aaaaaa</span></div>
                    <div class="content-main">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cupiditate dicta enim error
                        eum explicabo facere facilis ipsa itaque iusto, minus nihil non, numquam, omnis quia quis
                        tempora totam voluptatem.
                    </div>
                    <div class="action-set">
                        <div class="comment">评论</div>
                    </div>
                    <div class="comment-block">
                        <div class="hr"></div>
                        <div class="comment-item-set">
                            <div class="comment-item clearfix">
                                <div class="user">黎明</div>
                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut
                                    exercitationem laborum nisi quas quibusdam ratione rerum tenetur velit vero!
                                    Culpa dignissimos dolorum ducimus eaque facilis perferendis sequi sit voluptate?
                                </div>
                            </div>
                            <div class="comment-item clearfix">
                                <div class="user">黎明</div>
                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut
                                    exercitationem laborum nisi quas quibusdam ratione rerum tenetur velit vero!
                                    Culpa dignissimos dolorum ducimus eaque facilis perferendis sequi sit voluptate?
                                </div>
                            </div>
                            <div class="comment-item clearfix">
                                <div class="user">黎明</div>
                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut
                                    exercitationem laborum nisi quas quibusdam ratione rerum tenetur velit vero!
                                    Culpa dignissimos dolorum ducimus eaque facilis perferendis sequi sit voluptate?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/ng-template" id="signup.tpl">
    <div class="signup container" ng-controller="SignupController">
        <div class="card">
            <h1>注册</h1>
            [:User.signup_data:]
            <form name="signup_form" ng-submit="User.signup()">
                <div class="input-group">
                    <label>用户名:</label>
                    <input name="username" type="text" ng-model="User.signup_data.username" ng-minlength="3"
                           ng-maxlength="20" ng-model-options="{debounce:500}" required>
                    <div class="input-error-set" ng-if="signup_form.username.$touched">
                        <div ng-if="signup_form.username.$error.required">用户名为必填项</div>
                        <div ng-if="signup_form.username.$error.minlength||signup_form.username.$error.maxlength">
                            用户名的长度必须在3-20位之间
                        </div>
                        <div ng-if="User.signup_username_exists">
                            用户名已存在
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <label>密码:</label>
                    <input name="password" type="password" ng-model="User.signup_data.password" ng-minlength="6"
                           ng-maxlength="255" required>
                    <div class="input-error-set" ng-if="signup_form.password.$touched">
                        <div ng-if="signup_form.password.$error.required">密码为必填项</div>
                        <div ng-if="signup_form.password.$error.minlength||signup_form.password.$error.maxlength">
                            密码的长度必须在6-255之间
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <button type="submit" ng-disabled="signup_form.$invalid" class="primary">注册</button>
                </div>
            </form>
        </div>
    </div>
</script>
<script type="text/ng-template" id="login.tpl">
    <div class="login container" ng-controller="LoginController">
        <div class="card">
            <h1>登录</h1>
            <form name="login_form" ng-submit="User.login()">
                <div class="input-group">
                    <label>用户名</label>
                    <input type="text" ng-model="User.login_data.username" name="username" required>
                </div>
                <div class="input-group">
                    <label>密码</label>
                    <input type="password" ng-model="User.login_data.password" name="password" required>
                </div>
                <div ng-if="User.login_failed" class="input-error-set">
                    用户名或密码错误
                </div>
                <div class="input-group">
                    <button class="primary" ng-disabled="login_form.$invalid" type="submit">登录</button>
                </div>
            </form>
        </div>
    </div>
</script>
<script type="text/ng-template" id="question.add.tpl">
    <div class="question-add container" ng-controller="QuestionAddController">
        <div class="card">
            <form ng-submit="Question.add()" name="question_add_form">
                <div class="input-group">
                    <label>问题标题</label>
                    <input type="text" ng-model="Question.new_question.title" name="title" ng-minlength="5"
                           ng-maxlength="255" required>
                </div>
                <div class="input-group">
                    <label>问题描述</label>
                    <textarea type="text" ng-model="Question.new_question.desc" name="desc"></textarea>
                </div>
                <div class="input-group">
                    <button type="submit" ng-disabled="question_add_form.$invalid" class="primary">提交</button>
                </div>
            </form>
        </div>
    </div>
</script>
</html>