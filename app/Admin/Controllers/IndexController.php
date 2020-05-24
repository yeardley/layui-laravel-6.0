<?php
/**
 * Package App\AdminHelpers\Controllers\IndexController
 * @Author yeardley
 * @Date 2020/4/30 10:24
 * @Email 510865496@qq.com
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\AdminController;
use App\Services\AdminServices\MenuService;

class IndexController extends AdminController
{
    public function index()
    {
        if (!auth('admin')->user()) {
            return redirect(route('admin.login', ['skey' => encrypt(request()->url())]));
        }
        //获取菜单 权限
        $this->admin_user = auth('admin')->user();
        $this->menus = MenuService::instance()->getTree();
        $this->view('admin.admin');
    }

    public function home()
    {
        return $this->view('admin.home');
    }
}
