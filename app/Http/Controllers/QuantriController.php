<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Quantri;


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
	public function create()
	{
		return view('quantri.create');
	}
    public function dangnhap()
    {
        if (\Session::has('qt_maso'))
            return redirect('/');
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
	 * Route::post('quantri/store', 'QuantriController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'qt_email' => 'required|max:64',
            'qt_matkhau' => 'required|max:256',

		 ]);
		 
		$quantri = new Quantri();

		$quantri->qt_email = $request->input('qt_email');
		$quantri->qt_matkhau = $request->input('qt_matkhau');

		$quantri->save();

		return redirect()->route('quantri.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $qt_maso
	 * @return Response
	 *
	 * Route::get('quantri/show/{qt_maso}', 'QuantriController@show');
	 */
	public function show($qt_maso)
	{
		$quantri = Quantri::findOrFail($qt_maso);

		return view('quantri.show', compact('quantri',$quantri));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $qt_maso
	 * @return Response
	 *
	 * Route::get('quantri/edit/{qt_maso}', 'QuantriController@edit');
	 */
	public function edit($qt_maso)
	{
		$quantri = Quantri::findOrFail($qt_maso);

		return view('quantri.edit', compact('quantri',$quantri));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $qt_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('quantri/update/{qt_maso}', 'QuantriController@update');
	 */
	public function update(Request $request, $qt_maso)
	{
		$quantri = Quantri::findOrFail($qt_maso);

		$quantri->qt_email = $request->input('qt_email');
		$quantri->qt_matkhau = $request->input('qt_matkhau');

		$quantri->save();

		return redirect()->route('quantri.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $qt_maso
	 * @return Response
	 *
	 * Route::get('quantri/delete/{qt_maso}', 'QuantriController@destroy');
	 */
	public function destroy($qt_maso)
	{
		$quantri = Quantri::findOrFail($qt_maso);
		$quantri->delete();

		return redirect()->route('quantri.index')->with('message', 'Item deleted successfully.');
	}

}
