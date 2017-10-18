<?php

namespace App\Api\V1\Admin\Controllers;

use App\Api\V1\Admin\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

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
        $user_exits = User::where('username', $username)->exists();
        if ($user_exits) {
            return $this->ajaxReturn(0, '用户名已存在');
        }
        $users = new User();
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

    /**
     * 修改密码
     * @return \Illuminate\Http\JsonResponse
     */
    public function change_password()
    {
        $data = Input::all();
        $user_id = Auth::guard('admin')->user()->id;
        $rules = [
            'oldpassword' => 'required|between:6,20',
            'password' => 'required|between:6,20',
        ];
        $messages = [
            'required' => '密码不能为空',
            'between' => '密码必须是6~20位之间',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $user = User::find($user_id);
            if ($user) {
                if (!Hash::check($data['oldpassword'], $user->password)) {
                    return $this->ajaxReturn(0, '旧密码不对');
                }
                if ($data['oldpassword'] == $data['password']) {
                    return $this->ajaxReturn(0, '新旧密码不能一样');
                } else {
                    $user->password = bcrypt($data['password']);
                    if ($user->save()) {
                        Auth::guard('admin')->logout();
                        return $this->ajaxReturn(1, '密码修改成功,且登出');
                    } else {
                        return $this->ajaxReturn(0, '密码修改失败');
                    }
                }
            } else {
                return $this->ajaxReturn(0, '没有这个用户');
            }
        }
        $msg = $validator->messages()->first();
        return $this->ajaxReturn(0, $msg);
    }

    /**
     * 检测用户名是否存在
     * @return \Illuminate\Http\JsonResponse
     */
    public function exits()
    {
        $username = Input::get('username');
        $username_exit = User::where('username', $username)->get()->toArray();
        if ($username_exit) {
            return $this->ajaxReturn(0, '这个用户名已被注册过了');
        } else {
            return $this->ajaxReturn(1, '可以注册此用户名');
        }
    }

    /**
     * 获取用户信息
     * @return \Illuminate\Http\JsonResponse
     */
    public function read()
    {
        $id = Auth::id();
        $data = User::find($id);
        if ($data) {
            return $this->ajaxReturn(1, '成功获取用户信息', $data);
        } else {
            return $this->ajaxReturn(0, '服务器错误', $data);
        }

    }
}
