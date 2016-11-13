<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Danhgia;


class DanhgiaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('danhgia', 'DanhgiaController@index')->name('danhgia.index');
	 */
	public function index()
	{
		$danhgia = Danhgia::all();

		return view('danhgia.index', compact('danhgia',$danhgia));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('danhgia/create', 'DanhgiaController@create')->name('danhgia.create');
	 */
	public function create()
	{
		return view('danhgia.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('danhgia/store', 'DanhgiaController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'dg_nguoimua' => 'required|max:64',
            'dg_nguoiban' => 'required|max:64',
            'dg_diem' => 'required|numeric',

		 ]);
		 
		$danhgia = new Danhgia();

		$danhgia->dg_nguoimua = $request->input('dg_nguoimua');
		$danhgia->dg_nguoiban = $request->input('dg_nguoiban');
		$danhgia->dg_diem = $request->input('dg_diem');

		$danhgia->save();

		return redirect()->route('danhgia.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $dg_maso
	 * @return Response
	 *
	 * Route::get('danhgia/show/{dg_maso}', 'DanhgiaController@show');
	 */
	public function show($dg_maso)
	{
		$danhgia = Danhgia::findOrFail($dg_maso);

		return view('danhgia.show', compact('danhgia',$danhgia));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $dg_maso
	 * @return Response
	 *
	 * Route::get('danhgia/edit/{dg_maso}', 'DanhgiaController@edit');
	 */
	public function edit($dg_maso)
	{
		$danhgia = Danhgia::findOrFail($dg_maso);

		return view('danhgia.edit', compact('danhgia',$danhgia));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $dg_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('danhgia/update/{dg_maso}', 'DanhgiaController@update');
	 */
	public function update(Request $request, $dg_maso)
	{
		$danhgia = Danhgia::findOrFail($dg_maso);

		$danhgia->dg_nguoimua = $request->input('dg_nguoimua');
		$danhgia->dg_nguoiban = $request->input('dg_nguoiban');
		$danhgia->dg_diem = $request->input('dg_diem');

		$danhgia->save();

		return redirect()->route('danhgia.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $dg_maso
	 * @return Response
	 *
	 * Route::get('danhgia/delete/{dg_maso}', 'DanhgiaController@destroy');
	 */
	public function destroy($dg_maso)
	{
		$danhgia = Danhgia::findOrFail($dg_maso);
		$danhgia->delete();

		return redirect()->route('danhgia.index')->with('message', 'Item deleted successfully.');
	}

}
