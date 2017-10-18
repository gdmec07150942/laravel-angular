<?php
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => '\App\Api\V1\Admin\Controllers', 'middleware' => ['web']], function ($api) {
        $api->post('/login', 'LoginController@Login'); //登录
        $api->post('/register', 'UserController@signUp'); //注册
        $api->post('/exit', 'UserController@exits'); //检测是否用户名已经被注册过了
        $api->get('/logout', 'LoginController@Logout');//登出
        $api->post('/index', 'CommonController@index');//首页API
        $api->group(['prefix' => 'user', 'middleware' => ['is_login']], function ($api) {
            $api->any('/read', 'UserController@read'); //获取用户信息
        });
        $api->group(['prefix' => 'admin', 'middleware' => ['is_login']], function ($api) {
            $api->put('change', 'UserController@change_password'); //修改密码
//            $api->put('change', 'UserController@change');//找回密码
            $api->delete('remove', 'UserController@remove'); //删除问题
        });
        $api->group(['prefix' => 'question', 'middleware' => ['is_login']], function ($api) {
            $api->post('create', 'QuestionController@add'); //增加问题
            $api->put('change', 'QuestionController@change');//更新问题
            $api->any('read', 'QuestionController@read'); //查看问题
            $api->delete('remove', 'QuestionController@remove'); //删除问题
        });
        $api->group(['prefix' => 'answer', 'middleware' => ['is_login']], function ($api) {
            $api->post('create', 'AnswerController@add'); //增加回答
            $api->put('change', 'AnswerController@change');//更新回答
            $api->any('read', 'AnswerController@read'); //查看回答
            $api->post('vote', 'AnswerController@vote');//投票回答
        });
        $api->group(['prefix' => 'comment', 'middleware' => ['is_login']], function ($api) {
            $api->post('create', 'CommentController@add'); //增加评论
            $api->get('read', 'CommentController@read'); //查看评论
            $api->delete('remove', 'CommentController@remove'); //删除评论
        });
    });

});