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
        \App\Models\AdminUser::create(['name' => 'admin', 'password' => encrypt('admin'), 'is_system' => 1]);
        \App\Models\AdminUser::create(['name' => 'test', 'password' => encrypt('123456')]);
    }
}
