<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->smallInteger('is_system')->default(0);
            $table->string('authorize')->nullable();
            $table->string('tags')->nullable();
            $table->string('desc')->nullable();
            $table->smallInteger('status')->default(1);
            $table->string('login_ip')->nullable();
            $table->integer('login_num')->default(0);
            $table->dateTime('login_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('admin_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->string('name');
            $table->string('icon')->nullable();
            $table->string('url')->nullable();
            $table->string('params')->nullable();
            $table->string('target')->default('_self');
            $table->integer('sort')->default(0);
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });


        Schema::create('admin_configs', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
        Schema::dropIfExists('admin_roles');
        Schema::dropIfExists('admin_menus');
        Schema::dropIfExists('admin_configs');
    }
}
