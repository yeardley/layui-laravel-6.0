<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdminUsers();
        $this->createAdminMenus();
    }


    protected function createAdminUsers()
    {
        \App\Models\Admin\AdminUser::truncate();
        \App\Models\Admin\AdminUser::create(['username' => 'admin', 'password' => bcrypt('admin'), 'is_system' => 1]);
        $this->command->info('create admin user : admin');
        \App\Models\Admin\AdminUser::create(['username' => 'test', 'password' => bcrypt('123456')]);
        $this->command->info('create admin user : test');
    }

    protected function createAdminMenus()
    {
        \App\Models\Admin\AdminMenu::truncate();
        $datas = [
            ['parent_id' => 0, 'name' => '后台首页', 'icon' => '', 'url' => 'admin/home', 'sort' => 500],
            ['parent_id' => 0, 'name' => '系统管理', 'icon' => '', 'url' => '', 'sort' => 0],
            ['parent_id' => 2, 'name' => '系统菜单管理', 'icon' => 'layui-icon layui-icon-layouts', 'url' => 'admin/menus', 'sort' => 0],
        ];
        foreach ($datas as $data) {
            \App\Models\Admin\AdminMenu::create($data);
            $this->command->info('create admin menu : '. $data['name']);
        }
    }
}
