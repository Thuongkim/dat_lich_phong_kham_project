<?php

namespace App\Http\Controllers;

use Request;
use Session;
use App\NgayLam;
use App\BacSi;
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
		$count = $ngay_lam_viec->count();
		if(($count) < 1){
			$bac_si = BacSi::all();
			echo('<select id="maBacSi" name = "bac_si" class="form-control">');
				foreach ($bac_si as $value) {
						echo ('<option value='.$value->ma_bac_si.'>'.$value->ten_bac_si.'</option>');
					}
			echo('</select>');
		}else{
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
	}

	function getBacSiByDateAndCa($date, $ma_ca){
		$ngay_lam_viec = NgayLam::where("ma_ca",$ma_ca)->where("ngay",$date)->get();	
		$count = $ngay_lam_viec->count();
		if(($count) < 1){
			$bac_si = BacSi::all();
			echo('<select id="maBacSi" name = "bac_si" class="form-control">');
				foreach ($bac_si as $value) {
						echo ('<option value='.$value->ma_bac_si.'>'.$value->ten_bac_si.'</option>');
					}
			echo('</select>');
		}else{
			echo('<select name = "bac_si" class="form-control">');
			foreach ($ngay_lam_viec as $value) {
				$lich_hen = LichHen::where("ma_ca",$ma_ca)->where("ngay",$date)->where("ma_bac_si",$value->ma_bac_si)->get();
				$temp = $lich_hen->count();
				if ($temp < 5) {
					echo ('<option value='.$value->bac_si->ma_bac_si.'>'.$value->bac_si->ten_bac_si.'</option>');
				}
			}
		}
		echo('</select>');
	}

	function getBacSiByCa($ma_ca){
		$ngay_lam_viec = NgayLam::where("ma_ca",$ma_ca)->get();	
		$count = $ngay_lam_viec->count();
		if(($count) < 1){
			$bac_si = BacSi::all();
			echo('<select id="maBacSi" name = "bac_si" class="form-control">');
				foreach ($bac_si as $value) {
						echo ('<option value='.$value->ma_bac_si.'>'.$value->ten_bac_si.'</option>');
					}
			echo('</select>');
		}else{
			echo('<select name = "bac_si" class="form-control">');
			foreach ($ngay_lam_viec as $value) {
				$lich_hen = LichHen::where("ma_ca",$ma_ca)->where("ngay",$date)->where("ma_bac_si",$value->ma_bac_si)->get();
				$temp = $lich_hen->count();
				if ($temp < 5) {
					echo ('<option value='.$value->bac_si->ma_bac_si.'>'.$value->bac_si->ten_bac_si.'</option>');
				}
			}
		}
		echo('</select>');
	}

	function getDateByDoctorId($maBacSi){
		$todayDate = date('Y-m-d');
		$ngay_lam_viec = NgayLam::where("ma_bac_si",$maBacSi)->where('ngay', '>=', $todayDate)->get();
		foreach($ngay_lam_viec as $value) {
			$lich_hen = LichHen::where("ma_bac_si",$value->ma_bac_si)->where("ngay",$value->ngay)->get();
			$temp = $lich_hen->count();
			if($temp < 5 && $temp > 0 && $temp != ''){
				echo '<input type="text" value="'.$lich_hen[0]->ngay.'" class="form-control" name="date" id="date" >';
				break;
			}else{
				echo '<input type="text" value="'.$value->ngay.'" class="form-control" name="date" id="date" >';
				break;
			}
		}
	}

	function getDateByDoctorIdAndCa($maBacSi, $maCa){
		$ngay_lam_viec = NgayLam::where("ma_ca",$maCa)->where("ma_bac_si",$maBacSi)->where('ngay', '>=', $todayDate)->get();
		foreach($ngay_lam_viec as $value) {
			$lich_hen = LichHen::where("ma_ca",$value->ma_ca)->where("ma_bac_si",$value->ma_bac_si)->where("ngay",$value->ngay)->get();
			$temp = $lich_hen->count();
			if($temp < 5 && $temp > 0 && $temp != ''){
				echo '<input type="text" value="'.$lich_hen[0]->ngay.'" class="form-control" name="date" id="date" >';
				break;
			}else{
				echo '<input type="text" value="'.$value->ngay.'" class="form-control" name="date" id="date" >';
				break;
			}
		}
	}
}