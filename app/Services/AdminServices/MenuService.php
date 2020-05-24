<?php
/**
 * FileName: App\Services\AdminServices\MenuService
 * Author: yeardley
 * Email: 510865496@qq.com
 * Since: 2020/5/23 17:54
 * Describe:
 */

namespace App\Services\AdminServices;


use App\Models\Admin\AdminMenu;
use App\Services\Service;
use App\Tools\Tree;

class MenuService extends Service
{

    /**
     * 获取系统菜单树数据
     * @return array
     * @throws \ReflectionException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getTree()
    {
        $result = AdminMenu::where('status', 1)->orderBy('sort', 'desc')->orderBy('id', 'asc')->get();
        return Tree::arr2tree($result);
    }
}
