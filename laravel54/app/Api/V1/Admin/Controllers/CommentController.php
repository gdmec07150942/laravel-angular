<?php

namespace App\Api\V1\Admin\Controllers;


use App\Api\V1\Admin\Models\Comments;
use App\Api\V1\Admin\Models\Questions;
use App\Api\V1\Admin\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Api\V1\Admin\Models\Answers;

class CommentController extends CommonController
{
    /**
     * 增加评论
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
            'content.required' => '评论不能为空'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            if ($data) {
                $user_exit = Users::where('id', $id)->get()->toArray();
                $question_id = (isset($data['question_id'])) ? $data['question_id'] : '';
                $question_exit = Questions::where('id', $question_id)->get()->toArray();
                $answer_id = (isset($data['answer_id'])) ? $data['answer_id'] : '';
                $answer_exit = Answers::where('id', $answer_id)->get()->toArray();
                $comment_id = (isset($data['reply_to'])) ? $data['reply_to'] : '';
                $comment_exit = Comments::where('id', $comment_id)->get()->toArray();
                $comment = new Comments();
                if ($user_exit) {
                    if ($question_exit) {
                        $comment->question_id = $question_id;
                        $comment->content = $data['content'];
                        $result = $comment->save();
                    }
                    if ($answer_exit) {
                        $comment->question_id = $answer_id;
                        $comment->content = $data['content'];
                        $result = $comment->save();
                    }
                    if ($comment_exit) {
                        $comment->reply_to = $comment_id;
                        $comment->content = $data['content'];
                        $result = $comment->save();
                    }
                    if ($result) {
                        return $this->ajaxReturn(1, '增加评论成功');
                    } else {
                        return $this->ajaxReturn(0, '服务器错误');
                    }
                } else {
                    return $this->ajaxReturn(0, '不存在回答人，无法提交回答');
                }
            } else {
                return $this->ajaxReturn(0, '请选择你要评论的内容');
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
    public
    function change()
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
            $answer_user_id = Answer::where('id', $data['id'])->value('user_id');
            if ($user_exit) {
                if ($answer_user_id == $user_id) {
                    $result = Answer::where('id', $data['id'])->update([
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
    public
    function read()
    {
        $data = Input::all();
        $answer = '';
        if ($data) {
            if (isset($data['id'])) {
                $answer = Answer::find($data['id']);
            }
            if (isset($data['question_id'])) {
                $answer = Answer::where('question_id', $data['question_id'])->get()->keyBy('id');
            }
            if ($answer) {
                return $this->ajaxReturn(1, '查看回答成功', $answer);
            } else {
                return $this->ajaxReturn(0, '服务器错误');
            }
        }
    }


}
