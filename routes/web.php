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

Route::get('/','HomeController@index');
Route::get('/home/thuonghieu/{th_maso}','HomeController@thuonghieu');
Route::get('/home/nguoiban/{nd_maso}','HomeController@nguoiban');
Route::get('home/timkiem','HomeController@timkiem');
Route::get('home/giohang','GiohangController@chitiet');
Route::post('home/giohang/them','GiohangController@themgiohang');
Route::post('home/giohang/xoa','GiohangController@xoagiohang');
//Route::resource('nguoidung','NguoidungController');
Route::get('nguoidung/dangki','NguoidungController@dangki');
Route::post('nguoidung/_dangki','NguoidungController@_dangki');
Route::get('nguoidung/dangnhap','NguoidungController@dangnhap');
Route::post('nguoidung/_dangnhap','NguoidungController@_dangnhap');
Route::get('nguoidung/dangxuat','NguoidungController@dangxuat');
Route::get('nguoimua','NguoimuaController@chitiet');
Route::get('nguoiban','NguoibanController@chitiet');
//Route::resource('quantri','QuantriController');
Route::get('quantri/dangnhap','QuantriController@dangnhap');
Route::post('quantri/_dangnhap','QuantriController@_dangnhap');
Route::get('quantri','QuantriController@index');
Route::resource('thuonghieu','ThuonghieuController');
Route::post('thuonghieu/store', 'ThuonghieuController@store');
Route::get('thuonghieu/show/{th_maso}', 'ThuonghieuController@show');
Route::get('thuonghieu/edit/{th_maso}', 'ThuonghieuController@edit');
Route::put('thuonghieu/update/{th_maso}', 'ThuonghieuController@update');
Route::resource('hoadon','HoadonController');
Route::resource('hoadonnhap','HoadonnhapController');
Route::resource('hoadontk','HoadontkController');
Route::resource('danhgia','DanhgiaController');
Route::resource('cthoadon','CthoadonController');
//Route::resource('dienthoai','DienthoaiController');
Route::get('dienthoai/chitiet/{dt_maso}','DienthoaiController@chitiet');
Route::get('giohang/chitiet','GiohangController@chitiet');
