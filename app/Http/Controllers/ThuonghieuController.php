<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Thuonghieu;


class ThuonghieuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('thuonghieu', 'ThuonghieuController@index')->name('thuonghieu.index');
	 */
	public function index()
    {
		$thuonghieu = Thuonghieu::all();

		return view('thuonghieu.index', compact('thuonghieu',$thuonghieu));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('thuonghieu/create', 'ThuonghieuController@create')->name('thuonghieu.create');
	 */
	public function create()
	{
		return view('thuonghieu.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('thuonghieu/store', 'ThuonghieuController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'th_ten' => 'required|max:256',

		 ]);
		 
		$thuonghieu = new Thuonghieu();

		$thuonghieu->th_ten = $request->input('th_ten');

		$thuonghieu->save();

		return redirect()->route('thuonghieu.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $th_maso
	 * @return Response
	 *
	 * Route::get('thuonghieu/show/{th_maso}', 'ThuonghieuController@show');
	 */
	public function show($th_maso)
	{
		$thuonghieu = Thuonghieu::findOrFail($th_maso);

		return view('thuonghieu.show', compact('thuonghieu',$thuonghieu));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $th_maso
	 * @return Response
	 *
	 * Route::get('thuonghieu/edit/{th_maso}', 'ThuonghieuController@edit');
	 */
	public function edit($th_maso)
	{
		$thuonghieu = Thuonghieu::findOrFail($th_maso);

		return view('thuonghieu.edit', compact('thuonghieu',$thuonghieu));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $th_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('thuonghieu/update/{th_maso}', 'ThuonghieuController@update');
	 */
	public function update(Request $request, $th_maso)
	{
		$thuonghieu = Thuonghieu::findOrFail($th_maso);

		$thuonghieu->th_ten = $request->input('th_ten');

		$thuonghieu->save();

		return redirect()->route('thuonghieu.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $th_maso
	 * @return Response
	 *
	 * Route::get('thuonghieu/delete/{th_maso}', 'ThuonghieuController@destroy');
	 */
	public function destroy($th_maso)
	{
		$thuonghieu = Thuonghieu::findOrFail($th_maso);
		$thuonghieu->delete();

		return redirect()->route('thuonghieu.index')->with('message', 'Item deleted successfully.');
	}

}
