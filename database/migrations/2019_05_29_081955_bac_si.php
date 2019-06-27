<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BacSi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bac_si', function (Blueprint $table) {
            $table->increments('ma_bac_si');
            $table->string('ten_bac_si',50);
            $table->string('sdt',14)->unique();
            $table->string('email')->unique();
            $table->text('dia_chi');
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
