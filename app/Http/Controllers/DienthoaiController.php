<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Dienthoai;


class DienthoaiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('dienthoai', 'DienthoaiController@index')->name('dienthoai.index');
	 */
	public function index()
	{
		$dienthoai = Dienthoai::all();

		return view('dienthoai.index', compact('dienthoai',$dienthoai));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('dienthoai/create', 'DienthoaiController@create')->name('dienthoai.create');
	 */
	public function create()
	{
		return view('dienthoai.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('dienthoai/store', 'DienthoaiController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'dt_ten' => 'required|max:256',
            'dt_hdn' => 'required|max:64',
            'dt_sluong' => 'required|numeric',
            'dt_thuonghieu' => 'required|max:64',
            'dt_gia' => 'required|numeric',
            'dt_hinh' => 'required|max:256',
            'dt_loai' => 'required|max:256',
            'dt_kco' => 'required|max:256',
            'dt_pgiai' => 'required|max:256',
            'dt_pin' => 'required|max:256',
            'dt_hdh' => 'required|max:256',
            'dt_ram' => 'required|max:256',
            'dt_bnho' => 'required|max:256',
            'dt_cam' => 'required|max:256',

		 ]);
		 
		$dienthoai = new Dienthoai();

		$dienthoai->dt_ten = $request->input('dt_ten');
		$dienthoai->dt_hdn = $request->input('dt_hdn');
		$dienthoai->dt_sluong = $request->input('dt_sluong');
		$dienthoai->dt_thuonghieu = $request->input('dt_thuonghieu');
		$dienthoai->dt_gia = $request->input('dt_gia');
		$dienthoai->dt_hinh = $request->input('dt_hinh');
		$dienthoai->dt_loai = $request->input('dt_loai');
		$dienthoai->dt_kco = $request->input('dt_kco');
		$dienthoai->dt_pgiai = $request->input('dt_pgiai');
		$dienthoai->dt_pin = $request->input('dt_pin');
		$dienthoai->dt_hdh = $request->input('dt_hdh');
		$dienthoai->dt_ram = $request->input('dt_ram');
		$dienthoai->dt_bnho = $request->input('dt_bnho');
		$dienthoai->dt_cam = $request->input('dt_cam');

		$dienthoai->save();

		return redirect()->route('dienthoai.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $dt_maso
	 * @return Response
	 *
	 * Route::get('dienthoai/show/{dt_maso}', 'DienthoaiController@show');
	 */
	public function show($dt_maso)
	{
		$dienthoai = Dienthoai::findOrFail($dt_maso);

		return view('dienthoai.show', compact('dienthoai',$dienthoai));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $dt_maso
	 * @return Response
	 *
	 * Route::get('dienthoai/edit/{dt_maso}', 'DienthoaiController@edit');
	 */
	public function edit($dt_maso)
	{
		$dienthoai = Dienthoai::findOrFail($dt_maso);

		return view('dienthoai.edit', compact('dienthoai',$dienthoai));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $dt_maso
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('dienthoai/update/{dt_maso}', 'DienthoaiController@update');
	 */
	public function update(Request $request, $dt_maso)
	{
		$dienthoai = Dienthoai::findOrFail($dt_maso);

		$dienthoai->dt_ten = $request->input('dt_ten');
		$dienthoai->dt_hdn = $request->input('dt_hdn');
		$dienthoai->dt_sluong = $request->input('dt_sluong');
		$dienthoai->dt_thuonghieu = $request->input('dt_thuonghieu');
		$dienthoai->dt_gia = $request->input('dt_gia');
		$dienthoai->dt_hinh = $request->input('dt_hinh');
		$dienthoai->dt_loai = $request->input('dt_loai');
		$dienthoai->dt_kco = $request->input('dt_kco');
		$dienthoai->dt_pgiai = $request->input('dt_pgiai');
		$dienthoai->dt_pin = $request->input('dt_pin');
		$dienthoai->dt_hdh = $request->input('dt_hdh');
		$dienthoai->dt_ram = $request->input('dt_ram');
		$dienthoai->dt_bnho = $request->input('dt_bnho');
		$dienthoai->dt_cam = $request->input('dt_cam');

		$dienthoai->save();

		return redirect()->route('dienthoai.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $dt_maso
	 * @return Response
	 *
	 * Route::get('dienthoai/delete/{dt_maso}', 'DienthoaiController@destroy');
	 */
	public function destroy($dt_maso)
	{
		$dienthoai = Dienthoai::findOrFail($dt_maso);
		$dienthoai->delete();

		return redirect()->route('dienthoai.index')->with('message', 'Item deleted successfully.');
	}

}
