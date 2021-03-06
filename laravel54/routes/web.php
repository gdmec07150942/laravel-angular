<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});
Route::get('tpl/page/home', function () {
    return view('page.home');
});
Route::get('tpl/page/signup', function () {
    return view('page.signup');
});
Route::get('tpl/page/login', function () {
    return view('page.login');
});
Route::get('tpl/page/question_add', function () {
    return view('page.question_add');
});
Route::get('tpl/page/question_detail', function () {
    return view('page.question_detail');
});
Route::get('tpl/page/user', function () {
    return view('page.user');
});
//---------------------上面是前台，后面是后台--------------------
Route::get('admin/index/index', function () {
    return view('admin.index.index');
});
Route::get('admin/page/add', function () {
    return view('admin.page.add');
});
Route::get('admin/page/edit', function () {
    return view('admin.page.edit');
});
Route::get('admin/page/list', function () {
    return view('admin.page.list');
});