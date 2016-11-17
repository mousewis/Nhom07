<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Nguoidung;
use App\Thuonghieu;
use Illuminate\Http\Request;

use App\Dienthoai;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class NguoimuaController extends Controller
{
    //
    /**
     * HomeController constructor.
     */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dienthoai = Dienthoai::getList();
        $thuonghieu = Thuonghieu::all();
        return view('home.index', compact('dienthoai',$dienthoai),compact('thuonghieu',$thuonghieu));
    }
    public function thuonghieu($th_maso)
    {
        $dienthoai = Dienthoai::getthuonghieu($th_maso);
        $thuonghieu = Thuonghieu::all();
        return view('home.index', compact('dienthoai',$dienthoai),compact('thuonghieu',$thuonghieu));
    }
    public function chitiet()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==2))
        {
            $nguoimua = Nguoidung::chitiet_nguoimua(\Session::get('nd_maso'));
            return view('nguoimua.chitiet')->with('nguoimua', $nguoimua);
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này');
    }
}
