<?php

namespace App\Http\Controllers;
use App\Model\KhachHang;
use Illuminate\Http\Request;
use Validator;
use Session;


class KhachHangController extends Controller
{
	function dat_lich(){
		return view('khach_hang.sign_up');
	}

	function dang_nhap(){
		return view('khach_hang.log_in');
	}

	public function process_logup(Request $request)
	{
		$message = [
    				'required' => 'Trường :attribute bắt buộc nhập',
    				'email' => 'Trường :attribute phải có định dạng email',
    				'mat_khau.min' => 'Mật khẩu tối thiểu 3 kí tự',
    				'sdt.min' => 'Số điện thoại không đúng',
    				'mat_khau_nhap_lai.same' => 'Mật khẩu không trùng nhau',
    	];
    	$validator = Validator::make($request->all(), [
            'ten'     => 'required|max:255',
            'email'    => 'required|email',
            'sdt' => 'required|min:10',
            'ngay_sinh' => 'required',
            'dia_chi' => 'required',
            'mat_khau' => 'required|min:3',
            'mat_khau_nhap_lai' => 'required|same:mat_khau',
        ], $message);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
			$khach_hang = new KhachHang();
			$khach_hang->ten_khach_hang = $request->post('ten');
			$khach_hang->sdt = $request->post('sdt');
			$khach_hang->email = $request->post('email');
			$khach_hang->ngay_sinh = $request->post('ngay_sinh');
			$khach_hang->gioi_tinh = $request->post('gioi_tinh');
			$khach_hang->dia_chi = $request->post('dia_chi');
			$khach_hang->mat_khau = $request->post('mat_khau');
			$kiem_tra = $khach_hang->kiem_tra();
			$kiem_tra = $kiem_tra[0]->kiem_tra;
			if ($kiem_tra == 0) {
				$khach_hang->insert();
				$khach_hang = $khach_hang->get_one();
				if (count($khach_hang) == 1) {
					Session::put('ma_khach_hang',$khach_hang[0]->ma_khach_hang);
					Session::put('ten_khach_hang',$khach_hang[0]->ten_khach_hang);
				}
				return view('khach_hang.sign_up');
			}
			 return redirect()->back()->withInput()->withErrors(['whateverfieldname'=>'Email hoặc sđt đã dùng để đăng kí']);
			} catch (Exception $e) {
				 return redirect()->back()->withInput()->withErrors(['whateverfieldname'=>'Thêm lỗi, hoặc trùng, vui lòng kiểm tra lại']);
			}

	}

	public function process_login_khach_hang(Request $request)
	{
		$message = [
    				'required' => 'Trường :attribute bắt buộc nhập',
    				'email' => 'Trường :attribute phải có định dạng email',
    				'mat_khau.min' => 'Mật khẩu tối thiểu 3 kí tự',
    	];
    	$validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'mat_khau' => 'required|min:3',
        ], $message);	

		$khach_hang           = new KhachHang();
		
		$khach_hang->email    = $request->post('email');
		$khach_hang->mat_khau = $request->post('mat_khau');
		$khach_hang = $khach_hang->get_one();
		if (count($khach_hang) == 1) {
			Session::put('ma_khach_hang',$khach_hang[0]->ma_khach_hang);
			Session::put('ten_khach_hang',$khach_hang[0]->ten_khach_hang);
			return view('khach_hang.sign_up');
		}
		return redirect()->back()->withInput()->withErrors(['whateverfieldname'=>'Email hoặc sđt sai']);
	}

	public function logout()
	{
		Session::flush();
		return redirect()->route('dang_nhap')->with('success','Đăng xuất thành công');
	}

	function dang_ki(){
		return view('khach_hang.log_up');
	}
}