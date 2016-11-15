<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Nguoidung;


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
        if (\Session::has())
        return view('nguoidung.dangnhap');
    }
    public function _dangnhap(Request $request)
    {
        $this->validate($request,
            ['nd_maso'=>'required|max:64',
        'nd_matkhau'=>'required|max:256']);
        $check = Nguoidung::_dangnhap($request->input('nd_maso'),md5($request->input('nd_matkhau')));
        if (isset($check)) {
            \Session::put('nd_maso',$check->nd_maso);
            \Session::put('nd_loai',$check->nd_loai);
            if ($check->nd_loai=='1')
                return redirect('nguoiban/'.$check->nd_maso)->with('message','Đăng nhập thành công');
            else
                return redirect('/')->with('message','Đăng nhập thành công');
        }
        else
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
    /**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('nguoidung/store', 'NguoidungController@store');
	 */

	public function store(Request $request)
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
		$nguoidung->nd_email = $request->input('nd_email');
		$nguoidung->nd_matkhau = $request->input('nd_matkhau');
		$nguoidung->nd_hoten = $request->input('nd_hoten');
		$nguoidung->nd_sdt = $request->input('nd_sdt');
		$nguoidung->nd_dchi = $request->input('nd_dchi');
		$nguoidung->nd_loai = $request->input('nd_loai');
		$nguoidung->nd_taikhoan = 0;
		$nguoidung->nd_tinhtrang = 0;
		$nguoidung->nd_danhgia = 0;
		$nguoidung->nd_kichhoat = str_random(16);

		$nguoidung->save();

		return redirect('/')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $nd_maso
	 * @return Response
	 *
	 * Route::get('nguoidung/show/{nd_maso}', 'NguoidungController@show');
	 */
	public function show($nd_maso)
	{
		$nguoidung = Nguoidung::findOrFail($nd_maso);

		return view('nguoidung.show', compact('nguoidung',$nguoidung));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $nd_maso
	 * @return Response
	 *
	 * Route::get('nguoidung/edit/{nd_maso}', 'NguoidungController@edit');
	 */
	public function edit($nd_maso)
	{
		$nguoidung = Nguoidung::findOrFail($nd_maso);

		return view('nguoidung.edit', compact('nguoidung',$nguoidung));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $nd_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('nguoidung/update/{nd_maso}', 'NguoidungController@update');
	 */
	public function update(Request $request, $nd_maso)
	{
		$nguoidung = Nguoidung::findOrFail($nd_maso);

		$nguoidung->nd_email = $request->input('nd_email');
		$nguoidung->nd_matkhau = $request->input('nd_matkhau');
		$nguoidung->nd_hoten = $request->input('nd_hoten');
		$nguoidung->nd_sdt = $request->input('nd_sdt');
		$nguoidung->nd_dchi = $request->input('nd_dchi');
		$nguoidung->nd_loai = $request->input('nd_loai');
		$nguoidung->nd_taikhoan = $request->input('nd_taikhoan');
		$nguoidung->nd_tinhtrang = $request->input('nd_tinhtrang');
		$nguoidung->nd_danhgia = $request->input('nd_danhgia');
		$nguoidung->nd_kichhoat = $request->input('nd_kichhoat');

		$nguoidung->save();

		return redirect()->route('nguoidung.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $nd_maso
	 * @return Response
	 *
	 * Route::get('nguoidung/delete/{nd_maso}', 'NguoidungController@destroy');
	 */
	public function destroy($nd_maso)
	{
		$nguoidung = Nguoidung::findOrFail($nd_maso);
		$nguoidung->delete();

		return redirect()->route('nguoidung.index')->with('message', 'Item deleted successfully.');
	}

}
