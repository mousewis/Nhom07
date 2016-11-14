<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Thuonghieu;
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
        return view('giohang.chitiet');
    }
}
