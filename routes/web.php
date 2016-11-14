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
Route::get('/home/thuonghieu/{th_math}','HomeController@thuonghieu');
////Route::resource('nguoidung','NguoidungController');
Route::get('nguoidung/signup','NguoidungController@signup');
Route::post('nguoidung/store','NguoidungController@store');
Route::get('nguoidung/login','NguoidungController@login');
Route::post('nguoidung/checklogin','NguoidungController@checklogin');
Route::get('nguoidung/logout','NguoidungController@logout');
Route::resource('quantri','QuantriController');
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
Route::resource('dienthoai','DienthoaiController');
