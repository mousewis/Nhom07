<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cthoadon;


class CthoadonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('cthoadon', 'CthoadonController@index')->name('cthoadon.index');
	 */
	public function index()
	{
		$cthoadon = Cthoadon::all();

		return view('cthoadon.index', compact('cthoadon',$cthoadon));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('cthoadon/create', 'CthoadonController@create')->name('cthoadon.create');
	 */
	public function create()
	{
		return view('cthoadon.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('cthoadon/store', 'CthoadonController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'cthd_soluong' => 'required|numeric',
            'cthd_gia' => 'required|numeric',
            'cthd_tinhtrang' => 'required|numeric',

		 ]);
		 
		$cthoadon = new Cthoadon();

		$cthoadon->cthd_soluong = $request->input('cthd_soluong');
		$cthoadon->cthd_gia = $request->input('cthd_gia');
		$cthoadon->cthd_tinhtrang = $request->input('cthd_tinhtrang');

		$cthoadon->save();

		return redirect()->route('cthoadon.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $cthd_maso
	 * @return Response
	 *
	 * Route::get('cthoadon/show/{cthd_maso}', 'CthoadonController@show');
	 */
	public function show($cthd_maso)
	{
		$cthoadon = Cthoadon::findOrFail($cthd_maso);

		return view('cthoadon.show', compact('cthoadon',$cthoadon));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $cthd_maso
	 * @return Response
	 *
	 * Route::get('cthoadon/edit/{cthd_maso}', 'CthoadonController@edit');
	 */
	public function edit($cthd_maso)
	{
		$cthoadon = Cthoadon::findOrFail($cthd_maso);

		return view('cthoadon.edit', compact('cthoadon',$cthoadon));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $cthd_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('cthoadon/update/{cthd_maso}', 'CthoadonController@update');
	 */
	public function update(Request $request, $cthd_maso)
	{
		$cthoadon = Cthoadon::findOrFail($cthd_maso);

		$cthoadon->cthd_soluong = $request->input('cthd_soluong');
		$cthoadon->cthd_gia = $request->input('cthd_gia');
		$cthoadon->cthd_tinhtrang = $request->input('cthd_tinhtrang');

		$cthoadon->save();

		return redirect()->route('cthoadon.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $cthd_maso
	 * @return Response
	 *
	 * Route::get('cthoadon/delete/{cthd_maso}', 'CthoadonController@destroy');
	 */
	public function destroy($cthd_maso)
	{
		$cthoadon = Cthoadon::findOrFail($cthd_maso);
		$cthoadon->delete();

		return redirect()->route('cthoadon.index')->with('message', 'Item deleted successfully.');
	}

}
