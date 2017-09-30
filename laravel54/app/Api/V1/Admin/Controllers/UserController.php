<?php

namespace App\Api\V1\Admin\Controllers;

use App\Api\V1\Admin\Models\Users;
use Illuminate\Support\Facades\Request;

class UserController extends CommonController
{
    /**
     * 注册
     * @return \Illuminate\Http\JsonResponse
     */
    public function signUp()
    {
        $username = Request::get('username');
        $password = Request::get('password');
        if (!($username && $password)) {
            return $this->ajaxReturn(0, '用户名和密码皆不为空');
        }
        $user_exits = Users::where('username', $username)->exists();
        if ($user_exits) {
            return $this->ajaxReturn(0, '用户名已存在');
        }
        $users = new Users();
        $users->username = $username;
        $users->password = bcrypt($password);
        if ($users->save()) {
            return $this->ajaxReturn(1, '用户注册成功', [
                'id' => $users->id,
                'username' => $users->username
            ]);
        } else {
            return $this->ajaxReturn(0, '用户注册失败');
        }

    }
}
