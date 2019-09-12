<?php

namespace App;

use App\BacSi;
use Illuminate\Database\Eloquent\Model;

class Ca extends Model
{
    protected $table = "ca";
    protected $fillable = ['gio_bat_dau', 'gio_ket_thuc'];
    function bac_si(){
    	return $this->belongsTo("App\BacSi","ma_bac_si","ma_bac_si");
    }
}
