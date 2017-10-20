<?php

namespace App\Api\V1\Admin\Controllers;


use App\Api\V1\Admin\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Api\V1\Admin\Models\Questions;

class QuestionController extends CommonController
{
    /**
     * 增加提问
     * @return \Illuminate\Http\JsonResponse
     */
    public function add()
    {
        $data = Input::all();
        $id = Auth::guard('admin')->user()->id;
        $rules = [
            'title' => 'required',
        ];
        $messages = [
            'title.required' => '标题不能为空'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $user_exit = User::where('id', $id)->get()->toArray();
            if ($user_exit) {
                $quest = new Questions();
                if (isset($data['desc'])) {
                    $quest->desc = $data['desc'];
                }
                $quest->title = $data['title'];
                $quest->user_id = $id;
                if ($quest->save()) {
                    return $this->ajaxReturn(1, '提问成功', [
                        'title' => $data['title'],
                        'desc' => $quest->desc
                    ]);
                } else {
                    return $this->ajaxReturn(0, '服务器错误');
                }
            } else {
                return $this->ajaxReturn(0, '不存在提问人，无法提交问题');
            }
        } else {
            $msg = $validator->messages()->first();
            return $this->ajaxReturn(0, $msg);
        }

    }

    /**
     * 更新问题
     * @return \Illuminate\Http\JsonResponse
     */
    public function change()
    {
        $data = Input::all();
        $desc = '';
        $user_id = Auth::guard('admin')->user()->id;
        $rules = [
            'title' => 'required'
        ];
        $messages = [
            'title.required' => '标题不能为空'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $user_exit = User::where('id', $user_id)->get()->toArray();
            $question_id = Questions::where('id', $data['id'])->get()->toArray();
            if ($user_exit) {
                if ($question_id) {
                    if (isset($data['desc'])) {
                        $desc = $data['desc'];
                    }
                    $result = Questions::where('id', $data['id'])->update([
                        'desc' => $desc,
                        'title' => $data['title']
                    ]);
                    if ($result) {
                        return $this->ajaxReturn(1, '修改成功');
                    } else {
                        return $this->ajaxReturn(0, '服务器出错');
                    }
                } else {
                    return $this->ajaxReturn(0, '不知道客官您想修改什么问题');
                }
            } else {
                return $this->ajaxReturn(0, '不存在提问人,无法修改此问题');
            }
        }
        $msg = $validator->messages()->first();
        return $this->ajaxReturn(0, $msg);
    }

    /**
     * 查看问题
     * @return \Illuminate\Http\JsonResponse
     */
    public function read()
    {
        $data = Input::all();
        if (isset($data['user_id'])) {
            $questions = Questions::where('user_id', $data['user_id'])->get()->keyBy('id');
            return $this->ajaxReturn(1, '获取问题成功', $questions);
        }

        if (isset($data['id'])) {
            $questions = Questions::with('answers')->find($data['id']);
            return $this->ajaxReturn(1, '获取问题成功', $questions);
        }
        $limit = Request::get('limit') ?: 15; //默认分页为15条

        $skip = Request::get('page') ? (Request::get('page') - 1) * $limit : 0;
        $question = new Questions();
        $questions = $question->orderBy('created_at')->limit($limit)->skip($skip)->get(['id', 'title', 'desc', 'created_at', 'updated_at'])->keyBy('id');
        if ($questions) {
            return $this->ajaxReturn(1, '获取问题成功', $questions);
        } else {
            return $this->ajaxReturn(0, '服务器错误');
        }

    }

    /**
     * 删除问题
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove()
    {
        $user_id = Auth::guard('admin')->user()->id;
        $id = Request::get('id');
        if ($user_id) {
            if ($id) {
                $question = Questions::where('id', $id)->where('user_id', $user_id)->delete();
                if ($question) {
                    return $this->ajaxReturn(1, '删除问题成功');
                } else {
                    return $this->ajaxReturn(0, '服务器错误');
                }
            } else {
                return $this->ajaxReturn(0, '问题不存在，无法删除');
            }
        } else {
            return $this->ajaxReturn(0, '用户不存在');
        }

    }

}
