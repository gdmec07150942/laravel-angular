<?php

namespace App\Api\V1\Admin\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
}
