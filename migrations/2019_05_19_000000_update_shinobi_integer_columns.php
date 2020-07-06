<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateShinobiIntegerColumns extends Migration
{
    public function __construct()
    {
        // Register ENUM type
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }
    
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        Schema::disableForeignKeyConstraints();

        /*
        Schema::table('roles', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
            $table->unsignedBigInteger('role_id')->change();
            $table->unsignedBigInteger('user_id')->change();
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
            $table->unsignedBigInteger('permission_id')->change();
            $table->unsignedBigInteger('role_id')->change();
        });

        Schema::table('permission_user', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
            $table->unsignedBigInteger('permission_id')->change();
            $table->unsignedBigInteger('user_id')->change();
        });
        */
        
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('permission_user');
    }

}
