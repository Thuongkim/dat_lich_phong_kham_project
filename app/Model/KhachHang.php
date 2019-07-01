<?php

namespace App\Model;

use DB; 

/**
 * 
 */
class KhachHang
{
	private $table = 'khach_hang';

    public function get_one()
    {
        $array = DB::select("select * from $this->table where email = ? and mat_khau = ? limit 1",
        [   $this->email,
            $this->mat_khau,
        ]);
        return $array;
    }

	public function kiem_tra()
	{
		$kiem_tra = DB::select("select count(*) as kiem_tra from $this->table where email = ? and sdt = ? ",
			[	$this->email,
				$this->sdt,
			]);
		return $kiem_tra;
	}
	public function insert()
    {
    	DB::insert("insert into $this->table(ten_khach_hang,email,sdt,ngay_sinh,gioi_tinh,dia_chi,mat_khau)
    		values (?,?,?,?,?,?,?)",[
                $this->ten_khach_hang,
                $this->email,
                $this->sdt,
                $this->ngay_sinh,
                $this->gioi_tinh,
                $this->dia_chi,
                $this->mat_khau
            ]);
    }
}
?>