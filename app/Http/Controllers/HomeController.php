<?php

namespace App\Http\Controllers;

use App\Danhgia;
use App\Http\Controllers\Controller;
use App\Thuonghieu;
use Illuminate\Http\Request;

use App\Dienthoai;
use App\Nguoidung;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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
        $nguoiban = Nguoidung::nguoiban();
        return view('home.index', compact('dienthoai',$dienthoai))->with(['thuonghieu'=>$thuonghieu,'nguoiban'=>$nguoiban]);
    }
    public function thuonghieu($th_maso)
    {
        $dienthoai = Dienthoai::getthuonghieu($th_maso);
        $thuonghieu = Thuonghieu::all();
        $nguoiban = Nguoidung::nguoiban();
        return view('home.index', compact('dienthoai',$dienthoai))->with(['thuonghieu'=>$thuonghieu,'nguoiban'=>$nguoiban]);
    }
    public function timkiem(Request $request)
    {
        $dienthoai = Dienthoai::timkiem($request->input('dt_ten'),$request->input('dt_thuonghieu'),$request->input('dt_gia_tu'),$request->input('dt_gia_den'),$request->input('hdn_nguoidung'));
        $thuonghieu = Thuonghieu::all();
        $nguoiban = Nguoidung::nguoiban();
        return view('home.index', compact('dienthoai',$dienthoai))->with(['thuonghieu'=>$thuonghieu,'nguoiban'=>$nguoiban]);
    }
    public function nguoiban($nd_maso)
    {
        $dienthoai = Dienthoai::getnguoiban($nd_maso);
        $thuonghieu = Thuonghieu::all();
        $nguoiban = Nguoidung::nguoiban();
        $ct_nguoiban = Nguoidung::chitiet_nguoiban($nd_maso);
        $danhgia = Danhgia::nguoiban_danhgia($nd_maso);
        return view('home.index', compact('dienthoai',$dienthoai))->with(['thuonghieu'=>$thuonghieu,'nguoiban'=>$nguoiban,'danhgia'=>$danhgia,'ct_nguoiban'=>$ct_nguoiban]);
    }
    public function dienthoai($dt_maso)
    {
        $dienthoai = Dienthoai::chitiet($dt_maso);
        $link = \Storage::url('images/product-details/');
        $thuonghieu = Thuonghieu::all()->take(10);
        $nguoiban = Nguoidung::nguoiban();
        $array = [];
        return view('home.dienthoai',compact('dienthoai',$dienthoai))->with(['thuonghieu'=>$thuonghieu,'nguoiban'=>$nguoiban,'rowId'=>(md5($dt_maso.serialize($array))),'link'=>$link]);
    }
}
