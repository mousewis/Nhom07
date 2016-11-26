<?php

namespace App\Http\Controllers;

use App\Danhgia;
use App\Hoadontk;
use App\Http\Controllers\Controller;
use App\Nguoidung;
use Illuminate\Http\Request;
use App\Quantri;
use App\Taikhoan;
use App\Hoadon;
use App\Hoadonnhap;
class QuantriController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('quantri', 'QuantriController@index')->name('quantri.index');
	 */

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('quantri/create', 'QuantriController@create')->name('quantri.create');
	 */
	public function dangnhap()
    {
        if (\Session::has('qt_maso'))
            return redirect('quantri');
        return view('quantri.dangnhap');
    }
    public function _dangnhap(Request $request)
    {
        $this->validate($request,
            ['qt_maso'=>'required|max:64',
                'qt_matkhau'=>'required|max:256']);
        $check = Quantri::_dangnhap($request->input('qt_maso'),md5($request->input('qt_matkhau')));
        if (isset($check))
        {
            \Session::put('qt_maso', $check->qt_maso);
            return redirect('quantri')->with('message', 'Đăng nhập thành công');
        }
        return back()->withInput()->with('message','Kiểm tra tên người dùng và mật khẩu');
    }
    public function dangxuat()
    {
        if (\Session::has('qt_maso'))
            \Session::clear();
        return redirect('/');
    }
    public  function dangki()
    {
        return view('nguoidung.dangki');
    }
    public function  _dangki(Request $request)
    {
        $this->validate($request, [
            'nd_maso' => 'required|max:64',
            'nd_email' => 'required|max:64',
            'nd_matkhau' => 'required|max:256',
            'nd_hoten' => 'required|max:256',
            'nd_sdt' => 'required|max:256',
            'nd_dchi' => 'required|max:256',
            'nd_loai' => 'required|numeric',
        ]);
        $nguoidung = new Nguoidung();
        $nguoidung->nd_maso = $request->input('nd_maso');
        $nguoidung->nd_email = $request->input('nd_email');
        $nguoidung->nd_matkhau = md5($request->input('nd_matkhau'));
        $nguoidung->nd_hoten = $request->input('nd_hoten');
        $nguoidung->nd_sdt = $request->input('nd_sdt');
        $nguoidung->nd_dchi = $request->input('nd_dchi');
        $nguoidung->nd_loai = $request->input('nd_loai');
        $nguoidung->nd_taikhoan = 0;
        $nguoidung->nd_tinhtrang = 0;
        $nguoidung->nd_danhgia = 0;
        $nguoidung->nd_kichhoat = str_random(16);
        $nguoidung->save();
        return redirect('/')->with('message', 'Đã đăng kí thành công!');
    }
    public function  nguoiban(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $nguoiban = Nguoidung::qt_nguoiban(
                $request->input('col'),$request->input('type'));
            return view('quantri.nguoiban')->with('nguoiban',$nguoiban);
        }
        return redirect('/');
    }
    public function nguoimua(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $nguoimua = Nguoidung::qt_nguoimua(
                $request->input('col'),$request->input('type'));
            return view('quantri.nguoimua')->with('nguoimua',$nguoimua);
        }
        return redirect('/');
    }
    public function them_nguoidung()
    {
        if (\Session::has('qt_maso'))
        {
            return view('quantri.them_nguoidung');
        }
        return redirect('/');
    }
    public function _them_nguoidung(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $this->validate($request, [
                'nd_maso' => 'required|max:64',
                'nd_email' => 'required|max:64',
                'nd_matkhau' => 'required|max:256',
                'nd_hoten' => 'required|max:256',
                'nd_sdt' => 'required|max:256',
                'nd_dchi' => 'required|max:256',
                'nd_loai' => 'required|numeric',
            ]);
            $nd_kichhoat = str_random(16);
            $nguoidung = new Nguoidung();
            $nguoidung->nd_maso = $request->input('nd_maso');
            $nguoidung->nd_email = $request->input('nd_email');
            $nguoidung->nd_matkhau = md5($request->input('nd_matkhau'));
            $nguoidung->nd_hoten = $request->input('nd_hoten');
            $nguoidung->nd_sdt = $request->input('nd_sdt');
            $nguoidung->nd_dchi = $request->input('nd_dchi');
            $nguoidung->nd_loai = $request->input('nd_loai');
            $nguoidung->nd_taikhoan = 0;
            $nguoidung->nd_tinhtrang=1;
            $nguoidung->nd_danhgia = 0;
            $nguoidung->nd_kichhoat = str_random(16);;
            $nguoidung->save();
            if ($request->input('nd_loai')==1)
            {
                return redirect('quantri/nguoiban')->with('message','Đã thêm tài khoản thành công!');
            }
            return redirect('quantri/nguoimua')->with('message', 'Đã thêm tài khoản thành công!');
        }
        return redirect('quantri');
    }
    public function khoa_nguoidung()
    {
        if (\Session::has('qt_maso'))
        {
            $nguoidung = Nguoidung::all();
            $taikhoan = Taikhoan::getall();
            return view('quantri.khoa_nguoidung')->with(['nguoidung'=>$nguoidung,'taikhoan'=>$taikhoan]);
        }
        return redirect('/');
    }
    public function _khoa_nguoidung(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $this->validate($request, [
                'tk_nguoidung' => 'required',
                'tk_ghichu'=>'required|max:256',
            ]);
            $taikhoan = new Taikhoan();
            $taikhoan->tk_nguoidung = $request->input('tk_nguoidung');
            $taikhoan->tk_tgian = date('Y-m-d');
            $taikhoan->tk_noidung = $request->input('tk_noidung');
            $taikhoan->tk_ghichu = $request->input('tk_ghichu');
            $taikhoan->save();
            \DB::table('nguoidung')->where('nd_maso','=',$request->input('tk_nguoidung'))->update(['nd_tinhtrang'=>$request->input('tk_noidung')]);
            return redirect('quantri/nguoidung/khoa')->with('message','Đã cập nhật tài khoản hành công');
        }
        return redirect('/');
    }
    public function matkhau_nguoidung()
    {
        if (\Session::has('qt_maso'))
        {
            $nguoidung = Nguoidung::all();
            return view('quantri.matkhau_nguoidung')->with('nguoidung',$nguoidung);
        }
        return redirect('/');
    }
    public function _matkhau_nguoidung(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $this->validate($request, [
                'nd_maso' => 'required',
                'nd_matkhau' => 'required|max:256',
            ]);
            \DB::table('nguoidung')
                ->where('nd_maso','=',$request->input('nd_maso'))
                ->update(['nd_matkhau'=>md5($request->input('nd_matkhau'))]);
            return redirect('quantri/nguoidung/matkhau')->with('message', 'Đã cập nhật tài khoản thành công!');
        }
        return redirect('quantri');
    }
    public function hoadon(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $nguoidung = Nguoidung::all();
            $hoadon = Hoadon::quantri($request->input('hd_tinhtrang'),$request->input('col'),$request->input('type'),
                $request->input('hd_tgian_tu'),$request->input('hd_tgian_den'),$request->input('hd_dchi'),
                $request->input('cthd_tinhtrang'),$request->input('hd_nguoimua'),$request->input('hd_nguoiban'));
            return view('quantri.hoadon',compact('hoadon',$hoadon))->with('nguoidung',$nguoidung);
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function cthoadon($hd_maso)
    {
        if (\Session::has('qt_maso'))
        {
            $cthoadon = Hoadon::nguoimua_cthd($hd_maso);
            return view('quantri.ct_hoadon',compact('cthoadon',$cthoadon));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function naptien(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $nguoidung = Nguoidung::all();
            $hoadontk = Hoadontk::getall($request->input('col'),
                $request->input('type'),$request->input('hdtk_tgian_tu'),
                $request->input('hdtk_tgian_den'),$request->input('hdtk_gia_tu'),
                $request->input('hdtk_gia_den'),$request->input('hdtk_nguoidung'));
            $hoadontk_count = Hoadontk::count($request->input('col'),
                $request->input('type'),$request->input('hdtk_tgian_tu'),
                $request->input('hdtk_tgian_den'),$request->input('hdtk_gia_tu'),
                $request->input('hdtk_gia_den'),$request->input('hdtk_nguoidung'));
            $hoadontk_sum = Hoadontk::sum($request->input('col'),
                $request->input('type'),$request->input('hdtk_tgian_tu'),
                $request->input('hdtk_tgian_den'),$request->input('hdtk_gia_tu'),
                $request->input('hdtk_gia_den'),$request->input('hdtk_nguoidung'));
            return view('quantri.naptien',compact('hoadontk',$hoadontk))->with(['nguoidung'=>$nguoidung,
                'hoadontk_count'=>$hoadontk_count,'hoadontk_sum'=>$hoadontk_sum]);
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function danhgia()
    {
        if (\Session::has('qt_maso'))
        {
            $danhgia = Danhgia::getall();
            return view('quantri.danhgia',compact('danhgia',$danhgia));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function hoadonnhap(Request $request)
    {
        if (\Session::has('qt_maso'))
        {
            $hoadonnhap = Hoadonnhap::getall($request->input('col'),$request->input('type'));
            return view('quantri.hoadonnhap',compact('hoadonnhap',$hoadonnhap));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
}
