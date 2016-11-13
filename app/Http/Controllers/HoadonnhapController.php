<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Hoadonnhap;


class HoadonnhapController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('hoadonnhap', 'HoadonnhapController@index')->name('hoadonnhap.index');
	 */
	public function index()
	{
		$hoadonnhap = Hoadonnhap::all();

		return view('hoadonnhap.index', compact('hoadonnhap',$hoadonnhap));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('hoadonnhap/create', 'HoadonnhapController@create')->name('hoadonnhap.create');
	 */
	public function create()
	{
		return view('hoadonnhap.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('hoadonnhap/store', 'HoadonnhapController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'hdn_nguoidung' => 'required|max:64',
            'hdn_tgian' => 'required|date',
            'hdn_gia' => 'required|numeric',

		 ]);
		 
		$hoadonnhap = new Hoadonnhap();

		$hoadonnhap->hdn_nguoidung = $request->input('hdn_nguoidung');
		$hoadonnhap->hdn_tgian = $request->input('hdn_tgian');
		$hoadonnhap->hdn_gia = $request->input('hdn_gia');

		$hoadonnhap->save();

		return redirect()->route('hoadonnhap.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $hdn_maso
	 * @return Response
	 *
	 * Route::get('hoadonnhap/show/{hdn_maso}', 'HoadonnhapController@show');
	 */
	public function show($hdn_maso)
	{
		$hoadonnhap = Hoadonnhap::findOrFail($hdn_maso);

		return view('hoadonnhap.show', compact('hoadonnhap',$hoadonnhap));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $hdn_maso
	 * @return Response
	 *
	 * Route::get('hoadonnhap/edit/{hdn_maso}', 'HoadonnhapController@edit');
	 */
	public function edit($hdn_maso)
	{
		$hoadonnhap = Hoadonnhap::findOrFail($hdn_maso);

		return view('hoadonnhap.edit', compact('hoadonnhap',$hoadonnhap));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $hdn_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('hoadonnhap/update/{hdn_maso}', 'HoadonnhapController@update');
	 */
	public function update(Request $request, $hdn_maso)
	{
		$hoadonnhap = Hoadonnhap::findOrFail($hdn_maso);

		$hoadonnhap->hdn_nguoidung = $request->input('hdn_nguoidung');
		$hoadonnhap->hdn_tgian = $request->input('hdn_tgian');
		$hoadonnhap->hdn_gia = $request->input('hdn_gia');

		$hoadonnhap->save();

		return redirect()->route('hoadonnhap.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $hdn_maso
	 * @return Response
	 *
	 * Route::get('hoadonnhap/delete/{hdn_maso}', 'HoadonnhapController@destroy');
	 */
	public function destroy($hdn_maso)
	{
		$hoadonnhap = Hoadonnhap::findOrFail($hdn_maso);
		$hoadonnhap->delete();

		return redirect()->route('hoadonnhap.index')->with('message', 'Item deleted successfully.');
	}

}
