<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Hoadon;
use App\Nguoidung;


class HoadonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('hoadon', 'HoadonController@index')->name('hoadon.index');
	 */
	public function index()
	{
		$hoadon = Hoadon::all();

		return view('hoadon.index', compact('hoadon',$hoadon));
	}
	public function chitiet()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='2'))
        {
            $nguoidung = Nguoidung::chitiet_nguoimua(\Session::get('nd_maso'));
            return view('hoadon.chitiet',compact('nguoidung',$nguoidung));
        }
        else
        {
            return redirect('/')->with('error-message','Vui lòng đăng nhập và thêm sản phẩm vào giỏ hàng trước khi thanh toán');
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('hoadon/create', 'HoadonController@create')->name('hoadon.create');
	 */
	public function create()
	{
		return view('hoadon.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('hoadon/store', 'HoadonController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'hd_nguoimua' => 'required|max:64',
            'hd_tinhtrang' => 'required|numeric',
            'hd_gia' => 'required|numeric',
            'hd_tgian' => 'required|date',
            'hd_dchi' => 'required|max:256',

		 ]);
		 
		$hoadon = new Hoadon();

		$hoadon->hd_nguoimua = $request->input('hd_nguoimua');
		$hoadon->hd_tinhtrang = $request->input('hd_tinhtrang');
		$hoadon->hd_gia = $request->input('hd_gia');
		$hoadon->hd_tgian = $request->input('hd_tgian');
		$hoadon->hd_dchi = $request->input('hd_dchi');

		$hoadon->save();

		return redirect()->route('hoadon.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $hd_maso
	 * @return Response
	 *
	 * Route::get('hoadon/show/{hd_maso}', 'HoadonController@show');
	 */
	public function show($hd_maso)
	{
		$hoadon = Hoadon::findOrFail($hd_maso);

		return view('hoadon.show', compact('hoadon',$hoadon));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $hd_maso
	 * @return Response
	 *
	 * Route::get('hoadon/edit/{hd_maso}', 'HoadonController@edit');
	 */
	public function edit($hd_maso)
	{
		$hoadon = Hoadon::findOrFail($hd_maso);

		return view('hoadon.edit', compact('hoadon',$hoadon));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $hd_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('hoadon/update/{hd_maso}', 'HoadonController@update');
	 */
	public function update(Request $request, $hd_maso)
	{
		$hoadon = Hoadon::findOrFail($hd_maso);

		$hoadon->hd_nguoimua = $request->input('hd_nguoimua');
		$hoadon->hd_tinhtrang = $request->input('hd_tinhtrang');
		$hoadon->hd_gia = $request->input('hd_gia');
		$hoadon->hd_tgian = $request->input('hd_tgian');
		$hoadon->hd_dchi = $request->input('hd_dchi');

		$hoadon->save();

		return redirect()->route('hoadon.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $hd_maso
	 * @return Response
	 *
	 * Route::get('hoadon/delete/{hd_maso}', 'HoadonController@destroy');
	 */
	public function destroy($hd_maso)
	{
		$hoadon = Hoadon::findOrFail($hd_maso);
		$hoadon->delete();

		return redirect()->route('hoadon.index')->with('message', 'Item deleted successfully.');
	}

}
