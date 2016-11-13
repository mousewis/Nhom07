<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('Nguoidung','NguoidungController');
Route::resource('Quantri','QuantriController');
Route::resource('Thuonghieu','ThuonghieuController');
Route::post('Thuonghieu/store', 'ThuonghieuController@store');
Route::resource('Hoadon','HoadonController');
Route::resource('Hoadonnhap','HoadonnhapController');
Route::resource('Hoadontk','HoadontkController');
Route::resource('Danhgia','DanhgiaController');
Route::resource('Cthoadon','CthoadonController');
Route::resource('Dienthoai','DienthoaiController');
