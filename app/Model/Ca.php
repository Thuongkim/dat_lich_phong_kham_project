<?php

namespace App\Model;

use DB; 

/**
 * 
 */
class Ca
{
	private $table = 'ca';
	public function getCa($ngay,$ma_bac_si)
	{
		$ca = DB::select("select * from $this->table where not exists ( select null from ngay_lam_viec where $this->table.ma_ca = ngay_lam_viec.ma_ca and ngay = ? and ma_bac_si = ?)",
			[	$ngay,
				$ma_bac_si
			]);
		return $ca;
	}
}
?>