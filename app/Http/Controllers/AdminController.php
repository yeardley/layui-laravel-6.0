<?php
/**
 * Package App\Http\Controllers\AdminController
 * @Author yeardley
 * @Date 2020/4/30 10:23
 * @Email 510865496@qq.com
 */

namespace App\Http\Controllers;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function success($message = 'success', $data = [], $code = 1)
    {
        throw new HttpResponseException(Response::json(['code' => $code, 'info' => $message, 'data' => $data]));
    }

    public function error($message = 'error', $data = [], $code = 0)
    {
        throw new HttpResponseException(Response::json(['code' => $code, 'info' => $message, 'data' => $data]));
    }
}
