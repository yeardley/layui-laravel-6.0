<?php
/**
 * Package App\Admin\Controllers\IndexController
 * @Author yeardley
 * @Date 2020/4/30 10:24
 * @Email 510865496@qq.com
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\AdminController;

class IndexController extends AdminController
{
    public function index()
    {
        if (!auth('admin')->user()) {
            return redirect(route('admin.login', ['skey' => encrypt(request()->url())]));
        }
        //获取菜单 权限

        return view('admin.admin');
    }

    public function home()
    {

    }
}
