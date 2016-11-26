<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Nguoidung;
use Illuminate\Http\Request;
use App\Quantri;
use App\Taikhoan;
class QuantriController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('quantri', 'QuantriController@index')->name('quantri.index');
	 */
	public function index()
	{
		$quantri = Quantri::all();

		return view('quantri.index', compact('quantri',$quantri));
	}
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
    public function nguoimua()
    {
        if (\Session::has('qt_maso'))
        {
            $nguoiban = Nguoidung::qt_nguoimua();
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
            $taikhoan = Taikhoan::all();
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
            $taikhoan->tk_noidung = '-1';
            $taikhoan->tk_ghichu = $request->input('tk_ghichu');
            $taikhoan->save();
            \DB::table('nguoidung')->where('nd_maso','=',$request->input('tk_nguoidung'))->update(['nd_tinhtrang'=>'-1']);
            return redirect('quantri/nguoidung/khoa')->with('message','Đã khóa tài khoản hành công');
        }
        return redirect('/');
    }
    public function _mokhoa_nguoidung(Request $request)
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
            $taikhoan->tk_noidung = '-1';
            $taikhoan->tk_ghichu = $request->input('tk_ghichu');
            $taikhoan->save();
            \DB::table('nguoidung')->where('nd_maso','=',$request->input('tk_nguoidung'))->update(['nd_tinhtrang'=>'-1']);
            return redirect('quantri/nguoidung/khoa')->with('message','Đã khóa tài khoản hành công');
        }
        return redirect('/');
    }
}
