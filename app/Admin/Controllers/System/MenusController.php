<?php
/**
 * FileName: App\AdminHelpers\Controllers\System\MenusController
 * Author: yeardley
 * Email: 510865496@qq.com
 * Since: 2020/5/23 18:29
 * Describe:
 */

namespace App\Admin\Controllers\System;


use App\Http\Controllers\AdminController;
use App\Models\Admin\AdminMenu;
use App\Tools\Tree;

class MenusController extends AdminController
{

    public $model = AdminMenu::class;

    public function index()
    {
        $this->breadcrumbs = [
            '菜单列表' => '/admin/menus',
            '添加菜单' => '#',
        ];
        $this->_table(false);
    }

    protected function _index_page_filter(&$data)
    {
        $data->transform(function ($vo) use ($data) {
            $vo->url = !$vo->url ? '#' : $vo->url;
            if ($vo->url !== '#') {
                $vo->url = trim($vo->url . (empty($vo->params) ? '' : "?{$vo->params}"), '/\\');
            }
            $vo->ids = join(',', Tree::getArrSubIds($data, $vo['id']));
            return $vo;
        });
        $data = Tree::arr2table($data);
    }

    public function show()
    {

    }

    public function create()
    {
        $this->_form($this->model, 'form');
    }

    public function edit($id)
    {
        dump($id);
        $this->view('form');
    }

    /**
     * @param $vo
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function _form_filter(&$vo)
    {
        if (empty($vo['pid']) && $this->request->get('pid', '0')) $vo['pid'] = $this->request->get('pid', '0');
        // 列出可选上级菜单
        $menus = $this->_query($this->model)->where('status', 1)->orderByDesc('sort')->get()->toArray();

        $this->menus = Tree::arr2table(array_merge($menus, [['id' => '0', 'pid' => '-1', 'url' => '#', 'name' => '顶部菜单', 'icon' => '']]));
        if (isset($vo['id'])) foreach ($this->menus as $key => $menu) if ($menu['id'] === $vo['id']) $vo = $menu;
        foreach ($this->menus as $key => &$menu) {
            $menu['url'] = $menu['url'] == '' ? '#' : $menu['url'];
            if ($menu['spt'] >= 3 || $menu['url'] !== '#') unset($this->menus[$key]);
            if (isset($vo['spt']) && $vo['spt'] <= $menu['spt']) unset($this->menus[$key]);
        }
    }

    public function destroy()
    {

    }
}
