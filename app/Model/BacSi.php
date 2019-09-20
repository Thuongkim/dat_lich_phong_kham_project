<?php

namespace App\Model;

use DB;

class BacSi
{
	public $table = 'bac_si';
    public function get_one()
    {
        $array = DB::select("select * from $this->table where email = ? and mat_khau = ? limit 1",[
            $this->email,
            $this->mat_khau
        ]);
        return $array;
    }

    public function view_all()
    {
    	$array = DB::select("select * from $this->table");
    	return $array;
    }
      public function insert()
    {
        DB::insert("insert into bac_si(ten_bac_si,sdt,email,dia_chi,mat_khau,gioi_tinh)
            values (?,?,?,?,?,?)",[
                $this->ten_bac_si,
                $this->sdt,
                $this->email,
                $this->dia_chi,
                $this->mat_khau,
                $this->gioi_tinh
            ]);
    }
     public function delete()
    {
        DB::delete("delete from bac_si
            where ma_bac_si = ?",[ $this->ma_bac_si]);
    }
    public function get_bac_si()
    {
    	$array = DB::select("select * from bac_si where ma_bac_si = ?
            limit 1",[ $this->ma_bac_si]     );
    	return $array[0];
    }
    
    public function update()
    {
        DB::update("update bac_si
            set
            ten_bac_si = ?,
            sdt = ?,
            email = ?,
            dia_chi = ?,
            mat_khau = ?,
            gioi_tinh = ?
            where ma_bac_si = ?",[
                $this->ten_bac_si,
                $this->sdt,
                $this->email,
                $this->dia_chi,
                $this->mat_khau,
                $this->gioi_tinh,
                $this->ma_bac_si
            ]);
    }
}
