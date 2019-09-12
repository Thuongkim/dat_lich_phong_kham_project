<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LichHen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_hen', function (Blueprint $table) {
            $table->integer('ma_khach_hang')->unsigned();
            $table->integer('ma_bac_si')->unsigned();
            $table->date('ngay');
            $table->integer('ma_ca')->unsigned();
            $table->integer('trang_thai')->default(false);
            $table->text('ghi_chu')->nullable();

            $table->foreign('ma_khach_hang')->references('ma_khach_hang')->on('khach_hang');
            $table->foreign('ma_bac_si')->references('ma_bac_si')->on('bac_si');
            $table->foreign('ma_ca')->references('ma_ca')->on('ca');
            $table->primary(['ma_khach_hang','ma_ca','ngay']);
            
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
