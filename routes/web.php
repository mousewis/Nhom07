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
//Chức năng người mua, khách hàng
Route::get('home/thuonghieu/{th_maso}','HomeController@thuonghieu');
Route::get('home/nguoiban/{nd_maso}','HomeController@nguoiban');
Route::get('home/timkiem','HomeController@timkiem');
Route::get('home/dienthoai/{dt_maso}','HomeController@dienthoai');
//Giỏ hàng, thanh toán, hóa đơn
Route::get('home/giohang','GiohangController@chitiet');
Route::post('home/giohang/them','GiohangController@them_giohang');
Route::post('home/giohang/xoa','GiohangController@xoa_giohang');
Route::get('home/thanhtoan','NguoimuaController@thanhtoan');
Route::post('home/hoadon/them','NguoimuaController@_thanhtoan');
Route::get('dienthoai/hinh/{filename}', function ($filename)
{
    return Storage::get('images/product-details/'.$filename);
    /*
    $path = storage_path() . '/' . $filename;
    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;*/
});
//Người mua
Route::get('nguoimua','NguoimuaController@chitiet');
Route::get('nguoimua/hoadon','NguoimuaController@hoadon');
Route::get('nguoimua/hoadon/{hd_maso}','NguoimuaController@cthoadon');
Route::get('nguoimua/danhgia','NguoimuaController@danhgia');
Route::get('nguoimua/danhgia/them','NguoimuaController@them_danhgia');
Route::post('nguoimua/danhgia/luu','NguoimuaController@luu_danhgia');
//Chức năng người dùng (đăng kí, đăng nhập, sửa thông tin cơ bản)
Route::get('nguoidung/dangki','NguoidungController@dangki');
Route::post('nguoidung/_dangki','NguoidungController@_dangki');
Route::get('nguoidung/dangnhap','NguoidungController@dangnhap');
Route::post('nguoidung/_dangnhap','NguoidungController@_dangnhap');
Route::get('nguoidung/dangxuat','NguoidungController@dangxuat');
Route::post('nguoidung/capnhat','NguoidungController@capnhat');
Route::get('nguoidung/kichhoat','NguoidungController@kichhoat');
Route::post('nguoidung/_kichhoat','NguoidungController@_kichhoat');
//Chức năng người bán
Route::get('nguoiban','NguoibanController@chitiet');
Route::get('nguoiban/danhgia','NguoibanController@danhgia');
Route::get('nguoiban/hoadonnhap','NguoibanController@hoadonnhap');
Route::get('nguoiban/hoadon','NguoibanController@hoadon');
Route::post('nguoiban/hoadon/capnhat','NguoibanController@capnhat_hoadon');
Route::get('nguoiban/hoadon/{hd_maso}','NguoibanController@cthoadon');
Route::get('nguoiban/dienthoai','NguoibanController@dienthoai');
Route::get('nguoiban/dienthoai/them','NguoibanController@them_dienthoai');
Route::post('nguoiban/dienthoai/luu','NguoibanController@luu_dienthoai');
Route::get('nguoiban/dienthoai/{dt_maso}','NguoibanController@ct_dienthoai');
Route::get('nguoiban/naptien','NguoibanController@naptien');
Route::get('nguoiban/naptien/them','NguoibanController@them_naptien');
Route::post('nguoiban/naptien/them/paypal','PayPalController@index');
Route::get('paypal/status','PayPalController@status');
//Route::resource('quantri','QuantriController');
Route::get('quantri/dangnhap','QuantriController@dangnhap');
Route::post('quantri/_dangnhap','QuantriController@_dangnhap');
Route::get('quantri/dangxuat','QuantriController@dangxuat');
Route::get('quantri','QuantriController@nguoiban');
Route::get('quantri/nguoiban','QuantriController@nguoiban');
Route::get('quantri/nguoimua','QuantriController@nguoimua');
Route::get('quantri/nguoidung/them','QuantriController@them_nguoidung');
Route::post('quantri/nguoidung/_them','QuantriController@_them_nguoidung');
Route::get('quantri/nguoidung/khoa','QuantriController@khoa_nguoidung');
Route::post('quantri/nguoidung/_khoa','QuantriController@_khoa_nguoidung');
Route::get('quantri/nguoidung/matkhau','QuantriController@matkhau_nguoidung');
Route::post('quantri/nguoidung/_matkhau','QuantriController@_matkhau_nguoidung');
Route::get('quantri/nguoidung/{nd_maso}','QuantriController@chitiet_nguoidung');
Route::get('quantri/hoadon','QuantriController@hoadon');
Route::get('quantri/hoadon/{hd_maso}','QuantriController@cthoadon');
Route::get('quantri/naptien','QuantriController@naptien');
Route::get('quantri/hoadonnhap','QuantriController@hoadonnhap');
Route::get('quantri/danhgia','QuantriController@danhgia');
