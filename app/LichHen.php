<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichHen extends Model
{
    protected $table = 'lich_hen';

    protected $fillable = ['ma_khach_hang', 'ma_ca', 'ma_bac_si', 'ngay', 'trang_thai', 'ghi_chu'];

    public $timestamps = false;
}
