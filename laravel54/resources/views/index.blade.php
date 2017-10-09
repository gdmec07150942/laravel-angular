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
                <form id="quick_ask">
                    <div class="navbar-item">
                        <input type="text">
                    </div>
                    <div class="navbar-item">
                        <button>提问</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="fr">
            <a class="navbar-item" ui-sref="home">首页</a>
            <a class="navbar-item" ui-sref="login">登录</a>
            <a class="navbar-item" ui-sref="signup">注册</a>
        </div>
    </div>
</div>
<div class="page">
    <div ui-view>

    </div>
</div>
</body>
<script type="text/ng-template" id="home.tpl">
    <div class="home container">
        首页
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam beatae consequatur dicta dolore earum
        impedit, laborum libero nam odio perspiciatis qui recusandae suscipit ullam unde! Non omnis vero voluptatibus.
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
</html>