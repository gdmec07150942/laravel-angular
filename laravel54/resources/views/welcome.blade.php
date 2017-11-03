<!DOCTYPE html>
<html lang="en" ng-app="blog">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="images/timg.jpg" type="image/jpg">
    <title>Welcome To Mr.Xu</title>
</head>
<!--css-->
<link rel="stylesheet" href="css/home/base.css">
<link rel="stylesheet" href="css/home/login.css">
<link rel="stylesheet" href="css/home/styles.css">
<script src="node_modules/jquery/dist/jquery.js"></script>
<!--END css-->
<body>

    <div class="wrapper">
        <div class="container">
                <img src="images/timg.jpg" alt="" class="avatar img-circle">
            <div class="description">
              追逐繁星的孩子
            </div>


        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="links">
            <a href="./">Blog</a>
            <a href="/share">Share</a>
            <a target="_blank" href="https://segmentfault.com/u/zerofenglai">sf</a>
            <a target="_blank" href="https://github.com/gdmec07150942">GitHub</a>
            <a href="/about">Me</a>
            <a href="/donate">Donate</a>
        </div>
    </div>

</div>
</body>
</html>
