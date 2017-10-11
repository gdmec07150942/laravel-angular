<?php

namespace App\Api\V1\Admin\Controllers;

use App\Api\V1\Admin\Models\Answer;
use App\Api\V1\Admin\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;
use App\Api\V1\Admin\Models\Questions;

class CommonController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ajaxReturn($num, $msg, $data = null)
    {
        if ($num) {
            if (!$data) {
                return response()->json(['ret' => $num, 'msg' => $msg]);
            }
            return response()->json(['ret' => $num, 'msg' => $msg, 'data' => $data]);
        } else {
            return response()->json(['ret' => $num, 'error' => $msg]);
        }
    }

    public function index()
    {
        $limit = Request::get('limit') ?: 15; //默认分页为15条
        $answer_content = array();
        $question_content = array();
        $skip = Request::get('page') ? (Request::get('page') - 1) * $limit : 0;
        $question = new Questions();
        $answer = new Answer();
        $answers = $answer->with('users')->with('user')->limit($limit)->skip($skip)->orderBy('created_at', 'desc')->get();
        $questions = $question->with('user')->limit($limit)->skip($skip)->orderBy('created_at', 'desc')->get();
        $data = $questions->merge($answers);
        $data = $data->sortByDesc(function ($item) {
            return $item->created_at;
        });
        $data = $data->values()->all();
        return $this->ajaxReturn(1, '获取首页内容成功', $data);
    }
}
