<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('ma_khach_hang');
            $table->string('ten_khach_hang',50);
            $table->string('sdt',14)->unique();
            $table->string('email',100)->unique();
            $table->date('ngay_sinh');
            $table->string('dia_chi');
            $table->text('ghi_chu');
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
