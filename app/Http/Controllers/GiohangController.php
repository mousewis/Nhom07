<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Thuonghieu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Dienthoai;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class GiohangController extends Controller
{
    //
    /**
     * HomeController constructor.
     */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chitiet()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&\Session::get('nd_loai')==2) {
            return view('giohang.chitiet');
        }
            return redirect('/')->with('error-message','Vui lòng đăng nhập!');
    }
    public function themgiohang(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&\Session::get('nd_loai')==2) {
            Cart::add(['id' => $request->input('dt_maso'), 'name' => $request->input('dt_ten'), 'qty' => $request->input('dt_sluong'), 'price' => $request->input('dt_gia')]);
            return back()->with('message', 'Thêm vào giỏ hàng thành công');
        }
        return back()->with('error-message','Vui lòng đăng nhập để thêm vào giỏ hàng');
    }
    public function xoagiohang(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&\Session::get('nd_loai')==2) {
            Cart::remove($request->input('dt_maso'));
            return back()->with('message', 'Xóa khỏi giỏ hàng thành công');
        }
        return back()->with('error-message','Vui lòng đăng nhập!');
    }

}
