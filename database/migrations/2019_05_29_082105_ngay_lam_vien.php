<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NgayLamVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngay_lam_viec', function (Blueprint $table) {
            $table->date('ngay');
            $table->integer('ma_bac_si')->unsigned();
            $table->foreign('ma_bac_si')->references('ma_bac_si')->on('bac_si');
            $table->integer('ma_ca')->unsigned();
            $table->foreign('ma_ca')->references('ma_ca')->on('ca');
            $table->primary(['ngay','ma_bac_si','ma_ca']);
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
