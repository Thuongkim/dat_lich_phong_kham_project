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

	public function selectCa()
	{
		$array = DB::select("select * from $this->table");
		return $array;
	}

	public function view_all()
    {
    	$array = DB::select("select * from $this->table");
    	return $array;
    }
      public function insert()
    {
        DB::insert("insert into ca(gio_bat_dau,gio_ket_thuc)
            values (?,?)",[
                $this->gio_bat_dau,
                $this->gio_ket_thuc
            ]);
    }
     public function delete()
    {
        DB::delete("delete from ca
            where ma_ca = ?",[ $this->ma_ca]);
    }
    public function get_one()
    {
    	$array = DB::select("select * from ca where ma_ca = ?
            limit 1",[ $this->ma_ca]     );
    	return $array[0];
    }
    
    public function update()
    {
        DB::update("update ca
            set
            gio_bat_dau = ?,
            gio_ket_thuc = ?
            where ma_ca = ?",[
            $this->gio_bat_dau,
            $this->gio_ket_thuc,
            $this->ma_ca
            ]);
    }
}
?>