<?php

namespace App\Model;

use DB;

class Admin
{	

    public function getInfoLogin()
    {
        $array =DB::select("select * from admin where email = ? and mat_khau = ?",
            [
                $this->email,
                $this->mat_khau,
            ]);
        return $array;
    }
    public function view_all()
    {
    	$array = DB::select("select * from admin");
    	return $array;
    }
     public function insert()
    {
        DB::insert("insert into admin(ten_admin,sdt,email,dia_chi,mat_khau,gioi_tinh)
            values (?,?,?,?,?,?)",[
                $this->ten_admin,
                $this->sdt,
                $this->email,
                $this->dia_chi,
                $this->mat_khau,
                $this->gioi_tinh
            ]);
    }
    public function delete()
    {
        DB::delete("delete from admin
            where ma_admin = ?",[ $this->ma_admin]);
    }
    public function get_one()
    {
    	$array = DB::select("select * from admin where ma_admin = ?
            limit 1",[$this->ma_admin]);
    	return $array[0];
    }
    
    public function update()
    {
        DB::update("update admin
            set
            ten_admin = ?,
            sdt = ?,
            email = ?,
            dia_chi = ?,
            mat_khau = ?,
            gioi_tinh = ?
            where ma_admin = ?",[
                $this->ten_admin,
                $this->sdt,
                $this->email,
                $this->dia_chi,
                $this->mat_khau,
                $this->gioi_tinh,
                $this->ma_admin
            ]);
    }
}