<?php
/**
 * Package App\Admin\Controllers\LoginController
 * @Author yeardley
 * @Date 2020/4/30 10:49
 * @Email 510865496@qq.com
 */

namespace App\Admin\Controllers;


use App\Admin\Requests\LoginRequest;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

class LoginController extends AdminController
{
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $this->success('登录成功', url('admin'));
        }
        $this->error('账户或密码错误');
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        $this->success('登录成功', url('admin/login'));
    }
}
