<?php

namespace App\Api\V1\Admin\Controllers;


use App\Api\V1\Admin\Models\Comments;
use App\Api\V1\Admin\Models\Questions;
use App\Api\V1\Admin\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Api\V1\Admin\Models\Answer;

class CommentController extends CommonController
{
    /**
     * 增加评论
     * @return \Illuminate\Http\JsonResponse
     */
    public function add()
    {
        $data = Input::all();
        $user_id = Auth::guard('admin')->user()->id;
        $rules = [
            'content' => 'required',
        ];
        $messages = [
            'content.required' => '评论不能为空'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $user_exit = User::where('id', $user_id)->get()->toArray();
            $question_id = (isset($data['question_id'])) ? $data['question_id'] : '';
            $question_exit = Questions::where('id', $question_id)->get()->toArray();
            $answer_id = (isset($data['answer_id'])) ? $data['answer_id'] : '';
            $answer_exit = Answer::where('id', $answer_id)->get()->toArray();
            $comment_id = (isset($data['reply_to'])) ? $data['reply_to'] : '';
            $comment_exit = Comments::where('id', $comment_id)->get()->toArray();
            $comment = new Comments();
            if ($user_exit) {
                if (!$question_exit && !$answer_exit && !$comment_exit) {
                    return $this->ajaxReturn(0, '请您选择评论的内容');
                }
                if ($question_exit) {
                    $comment->question_id = $question_id;
                    $comment->content = $data['content'];
                }
                if ($answer_exit) {
                    $comment->answer_id = $answer_id;
                    $comment->content = $data['content'];
                }
                if ($comment_exit) {
                    $comment->reply_to = $comment_id;
                    $comment->content = $data['content'];
                }
                $comment->user_id = $user_id;
                $result = $comment->save();
                if ($result) {
                    return $this->ajaxReturn(1, '增加评论成功');
                } else {
                    return $this->ajaxReturn(0, '服务器错误');
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
     * 查看评论
     * @return \Illuminate\Http\JsonResponse
     */
    public function read()
    {
        $data = Input::all();
        if ($data) {
            $question_id = isset($data['question_id']) ?: '';
            $question_exit = Questions::where('id', $question_id)->get()->toArray();
            $answer_id = isset($data['answer_id']) ?: '';
            $anseer_exit = Answer::where('id', $answer_id)->get()->toArray();
            if (!$anseer_exit && !$question_exit) {
                return $this->ajaxReturn(0, '没有此问题或回答');
            }
            if ($anseer_exit) {
                $comments = Comments::where('answer_id', $answer_id)->get()->keyBy('id')->toArray();
            }
            if ($question_exit) {
                $comments = Comments::where('question_id', $question_id)->get()->keyBy('id')->toArray();
            }
            return $this->ajaxReturn(1, '查询成功', $comments);
        } else {
            return $this->ajaxReturn(0, '请选择查看的条件');
        }
    }


}
