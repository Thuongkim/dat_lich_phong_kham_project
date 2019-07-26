<?php

namespace App;

use App\BacSi;
use Illuminate\Database\Eloquent\Model;

class Ca extends Model
{
    protected $table = "ca";
    function bac_si(){
    	return $this->belongsTo("App\BacSi","ma_bac_si","ma_bac_si");
    }
}
