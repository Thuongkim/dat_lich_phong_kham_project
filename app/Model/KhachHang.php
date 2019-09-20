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

    public function get_khach_hang()
    {
        $array = DB::select("select * from khach_hang where ma_khach_hang = ?
            limit 1",[ $this->ma_khach_hang]     );
        return $array[0];
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

    public function view_all()
    {
        $array = DB::select("select * from $this->table");
        return $array;
    }

    public function delete()
    {
        DB::delete("delete from khach_hang
            where ma_khach_hang = ?",[ $this->ma_khach_hang]);
    }

     public function update()
    {
        DB::update("update khach_hang
            set
            ten_khach_hang = ?,
            sdt = ?,
            email = ?,
            dia_chi = ?,
            mat_khau = ?,
            gioi_tinh = ?
            where ma_khach_hang = ?",[
                $this->ten_khach_hang,
                $this->sdt,
                $this->email,
                $this->dia_chi,
                $this->mat_khau,
                $this->gioi_tinh,
                $this->ma_khach_hang
            ]);
    }
}
?>