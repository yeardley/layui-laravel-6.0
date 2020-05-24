<?php
/**
 * Package App\AdminHelpers\Controllers\LoginController
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

    public function index()
    {
        $this->skey = request()->get('skey');
        $this->view('admin.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $url = $request->get('skey') ? decrypt($request->get('skey')) : url('admin');
            $this->success('登录成功', $url);
        }
        $this->error('账户或密码错误');
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        $this->success('登录成功', url('admin/login'));
    }
}
