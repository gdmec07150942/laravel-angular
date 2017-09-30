<?php

namespace App\Api\V1\Admin\Controllers;


use App\Api\V1\Admin\Models\Questions;
use App\Api\V1\Admin\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Api\V1\Admin\Models\Answers;

class AnswerController extends CommonController
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
            'content' => 'required',
        ];
        $messages = [
            'content.required' => '回答不能为空'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $user_exit = Users::where('id', $id)->get();
            $question_id = $data['question_id'];
            $question_exit = Questions::where('id', $question_id)->get()->toArray();
            if ($user_exit) {
                if ($question_exit) {
                    $answer = new Answers();
                    $answer->content = $data['content'];
                    $answer->user_id = $id;
                    $answer->question_id = $question_id;
                    if ($answer->save()) {
                        return $this->ajaxReturn(1, '回答成功', [
                            'content' => $data['content'],
                        ]);
                    } else {
                        return $this->ajaxReturn(0, '服务器错误');
                    }
                } else {
                    return $this->ajaxReturn(0, '不存在此问题');
                }
            } else {
                return $this->ajaxReturn(0, '不存在回答人，无法提交回答');
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
        $user_id = Auth::guard('admin')->user()->id;
        $rules = [
            'content' => 'required'
        ];
        $messages = [
            'content.required' => '回答不能为空'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $user_exit = Users::where('id', $user_id)->get()->toArray();
            $answer_user_id = Answers::where('id', $data['id'])->value('user_id');
            if ($user_exit) {
                if ($answer_user_id == $user_id) {
                    $result = Answers::where('id', $data['id'])->update([
                        'content' => $data['content'],
                    ]);
                    if ($result) {
                        return $this->ajaxReturn(1, '修改成功');
                    } else {
                        return $this->ajaxReturn(0, '服务器出错');
                    }
                } else {
                    return $this->ajaxReturn(0, '这个回答不是客官您回答的');
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
        $answer = '';
        if ($data) {
            if (isset($data['id'])) {
                $answer = Answers::find($data['id']);
            }
            if (isset($data['question_id'])) {
                $answer = Answers::where('question_id', $data['question_id'])->get()->keyBy('id');
            }
            if ($answer) {
                return $this->ajaxReturn(1, '查看回答成功', $answer);
            } else {
                return $this->ajaxReturn(0, '服务器错误');
            }
        } else {
            return $this->ajaxReturn(0, '请选择查看的条件');
        }
    }


}
