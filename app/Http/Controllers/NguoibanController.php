<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Thuonghieu;
use Illuminate\Http\Request;

use App\Nguoidung;
use App\Dienthoai;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class NguoibanController extends Controller
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
        return view('home.index', compact('dienthoai',$dienthoai))->with('thuonghieu',$thuonghieu);
    }
    public function thuonghieu($th_maso)
    {
        $dienthoai = Dienthoai::getthuonghieu($th_maso);
        $thuonghieu = Thuonghieu::all();
        return view('home.index', compact('dienthoai',$dienthoai))->with('thuonghieu',$thuonghieu);
    }
    public function chitiet()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==1))
        {
            $nguoiban = Nguoidung::chitiet_nguoiban(\Session::get('nd_maso'));
            return view('nguoiban.chitiet', compact('nguoiban',$nguoiban));
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
    public function dienthoai()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==1)) {
            $dienthoai = Dienthoai::getnguoiban(\Session::get('nd_maso'));
            return view('nguoiban.dienthoai', compact('dienthoai', $dienthoai));
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
    public function them_dienthoai()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==1)) {
           return view('nguoiban.them_dienthoai');
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
    public function luu_dienthoai(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==1)) {
            $this->validate($request, [
                'dt_ten' => 'required|max:256',
                'dt_sluong' => 'required|numeric',
                'dt_gia' => 'required|numeric',
                'dt_hinh' => 'required|file|image',
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
            $dienthoai->dt_hinh = $request->file('dt_hinh')->storeAs(asset('images/product-details'), 'filename.jpg');
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
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
}
