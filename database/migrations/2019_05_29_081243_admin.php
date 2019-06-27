<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('admin', function (Blueprint $table) {
            $table->increments('ma');
            $table->string('ten_admin',50);
            $table->string('sdt',14);
            $table->string('email');
            $table->string('mat_khau');
            $table->boolean('gioi_tinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
