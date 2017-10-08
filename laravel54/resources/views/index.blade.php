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
<div class="navbar">
    <a href="" ui-sref="home">首页</a>
    <a href="" ui-sref="login">登录</a>
</div>
<div>
    <div ui-view>

    </div>
</div>
</body>
<script type="text/ng-template" id="home.tpl">
    <div>
        <h1>首页</h1>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aliquam at cum cupiditate dolor dolorem eum
        illum, impedit modi necessitatibus nihil nobis quasi, repellendus sapiente sed sunt totam ut.
    </div>
</script>
<script type="text/ng-template" id="login.tpl">
    <div>
        <h1>登录</h1>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aliquam at cum cupiditate dolor dolorem eum
        illum, impedit modi necessitatibus nihil nobis quasi, repellendus sapiente sed sunt totam ut.
    </div>
</script>
</html>