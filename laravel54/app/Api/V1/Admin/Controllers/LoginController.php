<?php

namespace App\Api\V1\Admin\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends CommonController
{

    /**
     * 登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function Login()
    {
        $data = Input::all();
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => '用户名不能为空',
            'password.required' => '密码不能为空'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $user = request(['email', 'password']);
            if (Auth::guard('admin')->attempt($user)) {
                Session(['email' => Auth::guard('admin')->user()->email]);
                return $this->ajaxReturn(1, '登录成功', [
                    'id' => Auth::guard('admin')->user()->id,
                    'email' => Auth::guard('admin')->user()->email
                ]);
            } else {
                return $this->ajaxReturn(0, '邮箱或密码错');
            }
        } else {
            $msg = $validator->messages()->first();
            return $this->ajaxReturn(0, $msg);
        }
    }

    /**
     * 登出
     * @return \Illuminate\Http\JsonResponse
     */
    public function Logout()
    {
        if (Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->logout()) {
                return $this->ajaxReturn(1, '登出成功');
            } else {
                return $this->ajaxReturn(0, '服务器错误');
            }
        }
        return $this->ajaxReturn(0, '尚未登录，何来退出');
    }
}
