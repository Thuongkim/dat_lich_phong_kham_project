<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\BacSi;
use Request;
use Session;
use App\Model\Admin;

class Controller extends BaseController
{
    public function view_login()
    {
    	return view('view_login');
    }

    public function welcome(){
        return view('layer.master');
    }

    public function process_login()
    {
        $admin           = new Admin();
        $admin->email    = Request::get('email');
        $admin->mat_khau = Request::get('mat_khau');
        $admin           = $admin->getInfoLogin();

    	$bac_si = new BacSi();
    	$bac_si->email = Request::get('email');
    	$bac_si->mat_khau = Request::get('mat_khau');
    	$bac_si = $bac_si->get_one();
    	if (count($bac_si) == 1) {
    	   Session::put('ma_bac_si',$bac_si[0]->ma_bac_si);
    	   Session::put('ten_bac_si',$bac_si[0]->ten_bac_si);
	       return redirect()->route('view_ngay_lam_viec');
    	}
        elseif (count($admin)==1) {
            Session::put('ma_admin',$admin[0]->ma);
            Session::put('ten_admin',$admin[0]->ten_admin);
            return redirect()->route('welcome');
        }

    return redirect()->route('view_login')->with('error','Đăng nhập sai');
	}

	public function logout()
	{
		Session::flush();
		return redirect()->route('view_login')->with('success','Đăng xuất thành công');
	}
}
