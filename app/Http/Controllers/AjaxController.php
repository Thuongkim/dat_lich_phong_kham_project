<?php

namespace App\Http\Controllers;

use Request;
use App\Model\Ca;

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
}