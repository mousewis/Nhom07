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
