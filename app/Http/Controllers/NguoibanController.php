<?php

namespace App\Http\Controllers;

use App\Danhgia;
use App\Http\Controllers\Controller;
use App\Thuonghieu;
use Illuminate\Http\Request;

use App\Nguoidung;
use App\Dienthoai;
use App\Hoadonnhap;
use App\Hoadon;
use App\Cthoadon;
use Illuminate\Support\Facades\Input;

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
            $dienthoai = Dienthoai::thongke_nguoiban(\Session::get('nd_maso'));
            return view('nguoiban.dienthoai', compact('dienthoai', $dienthoai));
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
    public function them_dienthoai()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==1)) {
           $thuonghieu = Thuonghieu::all();
            return view('nguoiban.them_dienthoai')->with('thuonghieu',$thuonghieu);
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
    public function luu_dienthoai(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==1)) {
            $nguoiban = Nguoidung::chitiet_nguoiban(\Session::get('nd_maso'));
            $thuonghieu = Thuonghieu::all();
            if (!(isset($nguoiban))||(int)$nguoiban->nd_taikhoan<10000||$nguoiban->nd_tinhtrang!='1')
                return back()->with([['thuonghieu',$thuonghieu],['error_message','Tài khoản không đủ để đăng tin!']]);
            $this->validate($request, [
                'dt_ten' => 'required|max:256',
                'dt_sluong' => 'required|numeric',
                'dt_gia' => 'required|numeric',
                'dt_hinh' => 'required|image|mimes:jpeg,bmp,png',
                'dt_loai' => 'required|max:256',
                'dt_kco' => 'required|max:256',
                'dt_pgiai' => 'required|max:256',
                'dt_pin' => 'required|max:256',
                'dt_hdh' => 'required|max:256',
                'dt_ram' => 'required|max:256',
                'dt_bnho' => 'required|max:256',
                'dt_cam' => 'required|max:256',
            ]);
            $hdn_maso = date('YmdHisu');
            if ($request->file('dt_hinh')->isValid())
            {
                $extension = $request->file('dt_hinh')->extension();
                $name = $hdn_maso.'.'.$extension;
                $request->file('dt_hinh')->storeAs('images/product-details',$name);
            }
            $hdn = new Hoadonnhap();
                $hdn->hdn_maso = $hdn_maso;
                $hdn->hdn_nguoidung = \Session::get('nd_maso');
                $hdn->hdn_tgian = date('Y-m-d');
                $hdn->hdn_gia = '10000';
            $hdn->save();
            $dienthoai = new Dienthoai();
                $dienthoai->dt_ten = $request->input('dt_ten');
                $dienthoai->dt_hdn = $hdn_maso;
                $dienthoai->dt_sluong = $request->input('dt_sluong');
                $dienthoai->dt_thuonghieu = $request->input('dt_thuonghieu');
                $dienthoai->dt_gia = $request->input('dt_gia');
                $dienthoai->dt_hinh = $name;
                $dienthoai->dt_loai = $request->input('dt_loai');
                $dienthoai->dt_kco = $request->input('dt_kco');
                $dienthoai->dt_pgiai = $request->input('dt_pgiai');
                $dienthoai->dt_pin = $request->input('dt_pin');
                $dienthoai->dt_hdh = $request->input('dt_hdh');
                $dienthoai->dt_ram = $request->input('dt_ram');
                $dienthoai->dt_bnho = $request->input('dt_bnho');
                $dienthoai->dt_cam = $request->input('dt_cam');
            $dienthoai->save();
            Nguoidung::capnhat_dt(\Session::get('nd_maso'),$nguoiban->nd_taikhoan);
            return redirect('nguoiban/dienthoai')->with('message', 'Đã thêm sản phẩm thành công!');
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
    public function ct_dienthoai($dt_maso)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==1)) {
            $dienthoai = Dienthoai::thongke();
            $thuonghieu = Thuonghieu::all();
            if (isset($dienthoai))
                foreach ($dienthoai as $item)
                {
                    if ($item->dt_maso==$dt_maso)
                        return view('nguoiban.ct_dienthoai')->with(['dienthoai'=>$item,'thuonghieu'=>$thuonghieu]);
                }
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
    }
    public function danhgia()
    {
        $danhgia = Danhgia::nguoiban_danhgia(\Session::get('nd_maso'));
        return view('nguoiban.danhgia')->with(['danhgia'=>$danhgia]);
    }
    public function hoadon(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='1'))
        {
            $hoadon = Hoadon::nguoiban(\Session::get('nd_maso'),$request->input('hd_tinhtrang'),$request->input('col'),$request->input('type'),$request->input('hd_tgian_tu'),$request->input('hd_tgian_den'),$request->input('hd_dchi'),$request->input('cthd_tinhtrang'));
            return view('nguoiban.hoadon',compact('hoadon',$hoadon));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function capnhat_hoadon(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='1'))
        {
            Hoadon::capnhat_cthd($request->input('cthd_maso'),$request->input('cthd_tinhtrang'),$request->input('cthd_hoadon'));
            return redirect('nguoiban/hoadon')->with('message','Cập nhật tình trạng thành công');
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function cthoadon($hd_maso)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='1'))
        {
            $cthoadon = Hoadon::nguoiban_cthd(\Session::get('nd_maso'),$hd_maso);
            return view('nguoiban.ct_hoadon',compact('cthoadon',$cthoadon));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function hoadonnhap(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='1'))
        {
            $hoadonnhap = Hoadonnhap::nguoiban(\Session::get('nd_maso'),$request->input('col'),$request->input('type'));
            return view('nguoiban.hoadonnhap',compact('hoadonnhap',$hoadonnhap));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
}
