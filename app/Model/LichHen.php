<?php

namespace App\Model;

use DB;

class LichHen
{	
	private $table = 'lich_hen';
    public function view_all()
    {
    	$array = DB::select("select * from $this->table
        join khach_hang on khach_hang.ma_khach_hang =  lich_hen.ma_khach_hang
        join bac_si on bac_si.ma_bac_si = lich_hen.ma_bac_si
        join ngay_lam_viec on ngay_lam_viec.ngay = lich_hen.ngay
        join ca on ca.ma_ca = lich_hen.ma_ca  ");
    	return $array;
    }
    public function view_lich_hen_da_huy()
    {
        $array = DB::select("select * from $this->table
        join khach_hang on khach_hang.ma_khach_hang =  lich_hen.ma_khach_hang
        join bac_si on bac_si.ma_bac_si = lich_hen.ma_bac_si
        join ngay_lam_viec on ngay_lam_viec.ngay = lich_hen.ngay
        join ca on ca.ma_ca = lich_hen.ma_ca  ");
        return $array;
    }
    public function view_lich_hen_da_duyet()
    {
        $array = DB::select("select * from $this->table
        join khach_hang on khach_hang.ma_khach_hang =  lich_hen.ma_khach_hang
        join bac_si on bac_si.ma_bac_si = lich_hen.ma_bac_si
        join ngay_lam_viec on ngay_lam_viec.ngay = lich_hen.ngay
        join ca on ca.ma_ca = lich_hen.ma_ca  ");
        return $array;
    }
}