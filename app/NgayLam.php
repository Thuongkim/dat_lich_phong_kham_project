<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BacSi;

class NgayLam extends Model
{
    protected $table = "ngay_lam_viec";
    function bac_si(){
    	return $this->belongsTo("App\BacSi","ma_bac_si","ma_bac_si");
    }
}