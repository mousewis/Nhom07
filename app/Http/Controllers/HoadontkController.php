<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Hoadontk;


class HoadontkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('hoadontk', 'HoadontkController@index')->name('hoadontk.index');
	 */
	public function index()
	{
		$hoadontk = Hoadontk::all();

		return view('hoadontk.index', compact('hoadontk',$hoadontk));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('hoadontk/create', 'HoadontkController@create')->name('hoadontk.create');
	 */
	public function create()
	{
		return view('hoadontk.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('hoadontk/store', 'HoadontkController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'hdtk_nguoidung' => 'required|max:64',
            'hdtk_tgian' => 'required|date',
            'hdtk_gia' => 'required|numeric',

		 ]);
		 
		$hoadontk = new Hoadontk();

		$hoadontk->hdtk_nguoidung = $request->input('hdtk_nguoidung');
		$hoadontk->hdtk_tgian = $request->input('hdtk_tgian');
		$hoadontk->hdtk_gia = $request->input('hdtk_gia');

		$hoadontk->save();

		return redirect()->route('hoadontk.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $hdtk_maso
	 * @return Response
	 *
	 * Route::get('hoadontk/show/{hdtk_maso}', 'HoadontkController@show');
	 */
	public function show($hdtk_maso)
	{
		$hoadontk = Hoadontk::findOrFail($hdtk_maso);

		return view('hoadontk.show', compact('hoadontk',$hoadontk));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $hdtk_maso
	 * @return Response
	 *
	 * Route::get('hoadontk/edit/{hdtk_maso}', 'HoadontkController@edit');
	 */
	public function edit($hdtk_maso)
	{
		$hoadontk = Hoadontk::findOrFail($hdtk_maso);

		return view('hoadontk.edit', compact('hoadontk',$hoadontk));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $hdtk_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('hoadontk/update/{hdtk_maso}', 'HoadontkController@update');
	 */
	public function update(Request $request, $hdtk_maso)
	{
		$hoadontk = Hoadontk::findOrFail($hdtk_maso);

		$hoadontk->hdtk_nguoidung = $request->input('hdtk_nguoidung');
		$hoadontk->hdtk_tgian = $request->input('hdtk_tgian');
		$hoadontk->hdtk_gia = $request->input('hdtk_gia');

		$hoadontk->save();

		return redirect()->route('hoadontk.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $hdtk_maso
	 * @return Response
	 *
	 * Route::get('hoadontk/delete/{hdtk_maso}', 'HoadontkController@destroy');
	 */
	public function destroy($hdtk_maso)
	{
		$hoadontk = Hoadontk::findOrFail($hdtk_maso);
		$hoadontk->delete();

		return redirect()->route('hoadontk.index')->with('message', 'Item deleted successfully.');
	}

}
