<?php

namespace App\Http\Controllers;

use Session;
use Request;
use App\BacSi;
use Validator;
use App\LichHen;
use App\Model\Ca;
use App\Model\KhachHang;


class KhachHangController extends Controller
{
	function dat_lich(){
		$ca = new Ca();
		$ca = $ca->selectCa();
		$bac_si = BacSi::all();
		return view('khach_hang.sign_up',['array_ca'=>$ca,"bac_si"=>$bac_si]);
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
				return redirect()->route('dat_lich');
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
			return redirect()->route('dat_lich');
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

	public function view_lich_hen()
	{
		$ma_khach_hang = Session::get('ma_khach_hang');
		$lich_hen = LichHen::where('ma_khach_hang', $ma_khach_hang)->get();

		return view('khach_hang.view_lich_hen')->with('lich_hen', $lich_hen);
	}

	// admin
	public function view_all()
	{
		$khach_hang = new KhachHang();
		$array_khach_hang = $khach_hang->view_all();

      // return view('view_all',compact('array_sinh_vien'));
		return view("khach_hang_view.view_all",[
			'array' => $array_khach_hang
		]);
	}
	public function delete($ma_khach_hang)
	{
		$khach_hang                = new KhachHang();
		$khach_hang->ma_khach_hang = $ma_khach_hang;
		$khach_hang->delete();

      //điều hướng
		return redirect()->route('view_all_khach_hang');
	}
	public function view_update($ma_khach_hang)
	{
		$khach_hang                = new KhachHang();
		$khach_hang->ma_khach_hang = $ma_khach_hang;
		$khach_hang                = $khach_hang->get_khach_hang();

		return view("khach_hang_view.view_update",[
			'khach_hang' => $khach_hang,
		]);
	}
	public function process_update()
	{

		$khach_hang                 = new KhachHang();
		$khach_hang->ma_khach_hang  = Request::get('ma_khach_hang');
		$khach_hang->ten_khach_hang = Request::get('ten_khach_hang');
		$khach_hang->sdt            = Request::get('sdt');
		$khach_hang->email          = Request::get('email');
		$khach_hang->dia_chi        = Request::get('dia_chi');
		$khach_hang->mat_khau       = Request::get('mat_khau');
		$khach_hang->gioi_tinh      = Request::get('gioi_tinh');
		$khach_hang->update();



      //điều hướng
		return redirect()->route('view_all_khach_hang');
	}
}