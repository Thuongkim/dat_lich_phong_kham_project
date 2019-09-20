<?php

namespace App\Model;

use DB; 

/**
 * 
 */
class NgayLamViec
{
	private $table = 'ngay_lam_viec';
	public function get_between_time($start,$end,$ma_bac_si)
	{
		$array = DB::select("select * from $this->table join ca on ca.ma_ca = $this->table.ma_ca where ngay >= ? and ngay <= ? and ma_bac_si = ?",
			[	$start,
				$end,
				$ma_bac_si
			]);
		return $array;
	}
	public function insert()
    {
    	DB::insert("insert into $this->table(ngay,ma_bac_si,ma_ca)
    		values (?,?,?)",[
                $this->ngay,
                $this->ma_bac_si,
                $this->ma_ca
            ]);
    }
    public function get_ngay_lam_viec($ma_bac_si)
    {
    	$ngay = DB::select("select count(*) as ngay from $this->table where ma_bac_si = $ma_bac_si and ngay > DATE(NOW() + INTERVAL (6 - WEEKDAY(NOW())) DAY)");
    	return $ngay;
    }
    
}
?>