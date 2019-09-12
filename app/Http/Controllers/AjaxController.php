<?php

namespace App\Http\Controllers;

use Request;
use Session;
use App\NgayLam;
use App\LichHen;
use App\Model\Ca;

class AjaxController extends Controller
{
	function getThemLich($ngay){
		$ma_bac_si = Session::get('ma_bac_si');
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
		echo('<select id="maBacSi" name = "bac_si" class="form-control">');
		$temp = array();
		foreach ($ngay_lam_viec as $value) {
			if(!in_array($value->bac_si->ten_bac_si, $temp)){
				echo ('<option value='.$value->bac_si->ma_bac_si.'>'.$value->bac_si->ten_bac_si.'</option>');
				array_push($temp,$value->bac_si->ten_bac_si);
			}
		}
		echo('</select>');
	}
	function getBacSiByCa($ma_ca,$date){
		$ngay_lam_viec = NgayLam::where("ma_ca",$ma_ca)->where("ngay",$date)->get();	
		echo('<select name = "ca" class="form-control">');
		foreach ($ngay_lam_viec as $value) {
			$lich_hen = LichHen::where("ma_ca",$ma_ca)->where("ngay",$date)->where("ma_bac_si",$value->ma_bac_si)->get();
			$temp = $lich_hen->count();
			if ($temp < 5) {
				echo ('<option value='.$value->bac_si->ma_bac_si.'>'.$value->bac_si->ten_bac_si.'</option>');
			}
		}
		echo('</select>');
	}
	function getDateByDoctorId($maBacSi, $maCa){
		$ngay_lam_viec = NgayLam::where("ma_ca",$maCa)->where("ma_bac_si",$maBacSi)->get();
		foreach($ngay_lam_viec as $value) {
			$lich_hen = LichHen::where("ma_ca",$value->ma_ca)->where("ma_bac_si",$value->ma_bac_si)->where("ngay",$value->ngay)->get();

			$temp = $lich_hen->count();
			if($temp < 5 && $temp > 0 && $temp != ''){
				echo '<input type="text" onchange="getDate()" value="'.$lich_hen[0]->ngay.'" class="form-control" name="date" id="date" placeholder="Ngày Hẹn" data-provide="datepicker">';
			}else{
				echo '<input type="text" onchange="getDate()" value="'.$value->ngay.'" class="form-control" name="date" id="date" placeholder="Ngày Hẹn" data-provide="datepicker">';
				break;
			}
		}
	}
	function getBacSiByCaId($ma_ca){
		$ngay_lam_viec = NgayLam::where("ma_ca",$ma_ca)->get();
		$temp = array();
		foreach ($ngay_lam_viec as $value) {
			if(!in_array($value->bac_si->ten_bac_si, $temp)){
				echo ('<option value='.$value->bac_si->ma_bac_si.'>'.$value->bac_si->ten_bac_si.'</option>');
				array_push($temp,$value->bac_si->ten_bac_si);
			}
		}
	}
}