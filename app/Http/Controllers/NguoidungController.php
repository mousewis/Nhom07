<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Kichhoat;
use Illuminate\Http\Request;

use App\Nguoidung;
use phpDocumentor\Reflection\DocBlock\Tags\See;


class NguoidungController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('nguoidung', 'NguoidungController@index')->name('nguoidung.index');
	 */
	public function index()
	{
		$nguoidung = Nguoidung::all();

		return view('nguoidung.index', compact('nguoidung',$nguoidung));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('nguoidung/create', 'NguoidungController@create')->name('nguoidung.create');
	 */
	public function create()
	{
		return view('nguoidung.create');
	}
    public function dangnhap()
    {
        if (\Session::has('nd_maso'))
            return redirect('/');
        return view('nguoidung.dangnhap');
    }
    public function _dangnhap(Request $request)
    {
        $this->validate($request,
            ['nd_maso'=>'required|max:64',
        'nd_matkhau'=>'required|max:256']);
        $check = Nguoidung::_dangnhap($request->input('nd_maso'),md5($request->input('nd_matkhau')));
        if (isset($check)) {
            if ($check->nd_loai=='2')
            {
                \Session::put('nd_maso',$check->nd_maso);
                \Session::put('nd_loai',$check->nd_loai);
                return redirect('/')->with('message','Đăng nhập thành công');
            }
            if (($check->nd_loai=='1')&&($check->nd_tinhtrang=='1'))
            {
                \Session::put('nd_maso',$check->nd_maso);
                \Session::put('nd_loai',$check->nd_loai);
                return redirect('nguoiban')->with('message','Đăng nhập thành công');
            }
            if (($check->nd_loai=='1')&&($check->nd_tinhtrang=='0'))
                return redirect('nguoidung/kichhoat')->with(['nd_maso'=>$check->nd_maso]);
            if (($check->nd_loai=='1')&&($check->nd_tinhtrang=='-1'))
                return redirect('/')->with('error-message','Tài khoản của bạn đã bị khóa! Vui lòng liên hệ với người quản trị để kích hoạt!');

        }
        return back()->withInput()->with('message','Kiểm tra tên người dùng và mật khẩu');
    }
    public function dangxuat()
    {
        if (\Session::has('nd_maso'))
            \Session::clear();
        return redirect('/');
    }
    public  function dangki()
    {
        if (\Session::has('nd_maso'))
            return redirect('/');
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
        $request->input('nd_loai')=='1'?$nguoidung->nd_tinhtrang = 0:$nguoidung->nd_tinhtrang=1;
        $nguoidung->nd_danhgia = 0;
        $request->input('nd_loai')=='1'?$nguoidung->nd_kichhoat = $nd_kichhoat:$nguoidung->nd_kichhoat = 0;
        $nguoidung->save();
        if ($request->input('nd_loai')==1)
            {
                \Mail::to($request->nd_email)->send(new Kichhoat($nd_kichhoat));
                return redirect('/')->with('message','Mã kích hoạt tài khoản được gửi đến email. Vui lòng đăng nhập và nhập mã kích hoạt để hoàn tất.');
            }
        return redirect('/')->with('message', 'Đã đăng kí thành công!');
    }
    /**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('nguoidung/store', 'NguoidungController@store');
	 */
    public function capnhat(Request $request)
    {
        if (\Session::has('nd_maso'))
        {
            $this->validate($request,['nd_hoten'=>'required|max:256',
                'nd_matkhau'=>'required|max:256',
            'nd_sdt'=>'required|max:256',
            'nd_dchi'=>'required|max:256']);
            Nguoidung::capnhat(\Session::get('nd_maso'),$request->input('nd_hoten'),
                $request->input('nd_matkhau'),$request->input('nd_sdt'),$request->input('nd_dchi'));
            return back()->with('message','Chỉnh sửa thông tin thành công');
        }
        return redirect('/')->with('error-message','Vui lòng đăng nhập!');
    }
    public function kichhoat()
    {
        if (\Session::has('nd_loai'))
            return redirect('nguoiban');
        if (!session('nd_maso'))
            return redirect('/')->with('error-message','Bạn không có quyền truy cập trang này!');
        return view('nguoidung.kichhoat')->with('nd_maso',session('nd_maso'));
    }
    public function _kichhoat(Request $request)
    {
        $this->validate($request,
            ['nd_kichhoat'=>'required|max:64']);
        $nguoidung = Nguoidung::kichhoat($request->input('nd_maso'),$request->input('nd_kichhoat'));
        if (isset($nguoidung))
        {
            Nguoidung::_kichhoat($nguoidung->nd_maso);
            \Session::put('nd_maso',$nguoidung->nd_maso);
            \Session::put('nd_loai',$nguoidung->nd_loai);
            return redirect('nguoiban')->with('message','Kích hoạt thành công!');
        }
        return back()->with(['error-message'=>'Kiểm tra lại mã kích hoạt!','nd_maso'=>$request->input('nd_maso')]);
    }
}
