<?php

namespace App\Http\Controllers;

use Request;
use App\Model\Ca;
use App\NgayLam;

class AjaxController extends Controller
{
	function getThemLich($ngay){
		$ma_bac_si = 1;
		$ca = new Ca();
		$array_ca = $ca->getCa($ngay,$ma_bac_si);
		echo('<select name = "ma_ca" class="form-control form-control-sm">');
		foreach ($array_ca as $value) {
			echo ('<option value='.$value->ma_ca.'>'.$value->gio_bat_dau.'-'.$value->gio_ket_thuc.'</option>');
		}
		echo('</select>');
	}
	function getBacSiByDate($date){
		$ngay_lam_viec = NgayLam::where("ngay",$date)->get();
		echo('<select name = "bac_si" class="form-control">');
		foreach ($ngay_lam_viec as $value) {
			echo ('<option value='.$value->bac_si->ma_bac_si.'>'.$value->bac_si->ten_bac_si.'</option>');
		}
		echo('</select>');
	}
	function getBacSiByCa($ma_ca,$date){
		$ngay_lam_viec = NgayLam::where("ma_ca",$ma_ca)->where("ngay",$date)->get();
		echo('<select name = "ca" class="form-control">');
		foreach ($ngay_lam_viec as $value) {
			echo ('<option value='.$value->bac_si->ma_bac_si.'>'.$value->bac_si->ten_bac_si.'</option>');
		}
		echo('</select>');
	}
}