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
    }


    protected function createAdminUsers()
    {
        \App\Models\AdminUser::truncate();
        \App\Models\AdminUser::create(['name' => 'admin', 'password' => bcrypt('admin'), 'is_system' => 1]);
        \App\Models\AdminUser::create(['name' => 'test', 'password' => bcrypt('123456')]);
    }
}
