<?php

namespace App\Http\Controllers;

use App\Danhgia;
use App\Hoadonnhap;
use App\Http\Controllers\Controller;
use App\Nguoidung;
use App\Thuonghieu;
use Faker\Provider\cs_CZ\DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Dienthoai;
use App\Hoadon;
use App\Cthoadon;
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
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')==2))
        {
            $nguoimua = Nguoidung::chitiet_nguoimua(\Session::get('nd_maso'));
            return view('nguoimua.chitiet', compact('nguoimua', $nguoimua));
        }
        return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này');
    }
    public function thanhtoan()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='2'))
        {
            $nguoimua = Nguoidung::chitiet_nguoimua(\Session::get('nd_maso'));
            return view('nguoimua.thanhtoan',compact('nguoimua',$nguoimua));
        }
        else
        {
            return redirect('/')->with('error-message','Vui lòng đăng nhập và thêm sản phẩm vào giỏ hàng trước khi thanh toán');
        }
    }
    public function _thanhtoan(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='2'))
        {
            if (Cart::count()==0)
                return back()->with('error-message','Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán');
            if ($request->input('type')=='1')
                $this->validate($request, [
                'hd_nguoinhan' => 'required|max:256',
                'hd_dchi' => 'required|max:256',
                'hd__sdt' => 'required|max:256',
            ]);
            $hd_maso = date('YmdHisu');
            $hd_nguoimua = \Session::get('nd_maso');
            $hd_nguoinhan = ($request->input('type')=='0')?($request->input('nd_hoten')):($request->input('hd_nguoinhan'));
            $hd_soluong = Cart::content()->groupBy('id')->count();
            $hd_xuly = 0;
            $hd_hoantat = 0;
            $hd_huy = 0;
            $hd_gia = Cart::total_value();
            $hd_tgian = date('Y-m-d');
            $hd_dchi = ($request->input('type')=='0')?($request->input('nd_dchi')):($request->input('hd_dchi'));
            $hd_sdt = ($request->input('type')=='0')?($request->input('nd_sdt')):($request->input('hd_sdt'));
            $hoadon = new Hoadon();
            $hoadon->hd_maso = $hd_maso;
            $hoadon->hd_nguoimua = $hd_nguoimua;
            $hoadon->hd_nguoinhan = $hd_nguoinhan;
            $hoadon->hd_soluong = $hd_soluong;
            $hoadon->hd_xuly = $hd_xuly;
            $hoadon->hd_hoantat = $hd_hoantat;
            $hoadon->hd_huy = $hd_huy;
            $hoadon->hd_gia = $hd_gia;
            $hoadon->hd_tgian = $hd_tgian;
            $hoadon->hd_dchi = $hd_dchi;
            $hoadon->hd_sdt = $hd_sdt;
            $hoadon->save();
            foreach (Cart::content() as $item)
            {
                $cthoadon = new Cthoadon();
                $cthoadon->cthd_hoadon = $hd_maso;
                $cthoadon->cthd_dienthoai = $item->id;
                $cthoadon->cthd_soluong = $item->qty;
                $cthoadon->cthd_gia = $item->price;
                $cthoadon->cthd_tinhtrang = 0;
                $cthoadon->save();
                Dienthoai::them_hoadon($item->id,$item->qty);
            }
            Cart::destroy();
            return redirect('/')->with('message','Đã gửi hóa đơn thành công!');
        }
        else
        {
            return redirect('/')->with('error-message','Vui lòng đăng nhập và thêm sản phẩm vào giỏ hàng trước khi thanh toán');
        }
    }
    public function hoadon(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='2'))
        {
            $hoadon = Hoadon::nguoimua(\Session::get('nd_maso'),$request->input('hd_tinhtrang'));
            return view('nguoimua.hoadon',compact('hoadon',$hoadon));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function cthoadon($hd_maso)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='2'))
        {
            $cthoadon = Hoadon::nguoimua_cthd($hd_maso);
            return view('nguoimua.ct_hoadon',compact('cthoadon',$cthoadon));
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function danhgia()
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='2')) {
            $danhgia = Danhgia::nguoimua(\Session::get('nd_maso'));
            return view('nguoimua.danhgia')->with('danhgia',$danhgia);
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
    public function _danhgia(Request $request)
    {
        if (\Session::has('nd_maso')&&\Session::has('nd_loai')&&(\Session::get('nd_loai')=='2')) {
            $this->validate($request, [
                'dg_diem' => 'required',
            ]);

            return view('nguoimua.danhgia')->with('message','Thêm đánh giá thành công!');
        }
        else
        {
            return redirect('/')->with('error-message','Bạn không đủ quyền truy cập trang này!');
        }
    }
}
