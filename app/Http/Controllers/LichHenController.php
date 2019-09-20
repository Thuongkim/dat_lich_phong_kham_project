<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichHen;
use Session;
use Exception;

class LichHenController extends Controller
{
    public function create(Request $request)
    {

    	$request->validate([
    		'date' => 'required',
    		'ca' => 'required',
            'bac_si' => 'required',
    	]);

        try {
        	$lich_hen = new LichHen();
        	$lich_hen->ma_khach_hang = Session::get('ma_khach_hang');
        	$lich_hen->ma_bac_si = $request->bac_si;
        	$lich_hen->ngay = $request->date;
        	$lich_hen->ma_ca = $request->ca;
            $lich_hen->ghi_chu = $request->ghi_chu;
        	$lich_hen->save();

    		return view('khach_hang.sign_up')->with('success','Đặt lịch thành công');
        } catch (Exception $e) {
                 return redirect()->back()->withInput()->withErrors(['whateverfieldname'=>'Thêm lỗi, hoặc trùng, vui lòng kiểm tra lại']);
            }
    }

    public function delete($ma_khach_hang, $ngay, $ma_ca)
    {
        $lich_hen = LichHen::where('ma_khach_hang', $ma_khach_hang)->where('ngay', $ngay)->where('ma_ca', $ma_ca);
        if($lich_hen) {
            $lich_hen->delete();
            return redirect()->route('view_lich_hen')->with('success', 'Xóa lịch hẹn thành công');
        }
        return redirect()->back()->withInput()->withErrors(['whateverfieldname'=>'Xóa lỗi vui lòng kiểm tra lại']);
    }
}
