<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Dienthoai extends Model {
	
    protected $table = 'dienthoai';
	
    public $timestamps = false;
	
	protected $fillable = ['dt_ten', 'dt_hdn', 'dt_sluong', 'dt_thuonghieu', 'dt_gia', 'dt_hinh', 'dt_loai', 'dt_kco', 'dt_pgiai', 'dt_pin', 'dt_hdh', 'dt_ram', 'dt_bnho', 'dt_cam'];

    public static  function getList()
    {

        return \DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->join('nguoidung','hdn_nguoidung','=','nd_maso')->orderBy('hdn_tgian','desc')->paginate(1,['*'],'page_dt');
    }
    public static  function getthuonghieu($th_maso)
    {
        return \DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->join('nguoidung','hdn_nguoidung','=','nd_maso')->where('dt_thuonghieu','=',$th_maso)->orderBy('hdn_tgian','desc')->paginate(1,['*'],'page_dt');
    }
    public static  function getnguoiban($nd_maso)
    {
        return \DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->join('nguoidung','hdn_nguoidung','=','nd_maso')->where('nd_maso','=',$nd_maso)->orderBy('hdn_tgian','desc')->paginate(1,['*'],'page_dt');
    }
    public static function chitiet($dt_maso)
    {
        return \DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->join('thuonghieu','dt_thuonghieu','=','th_maso')->where('dt_maso','=',$dt_maso)->first();
    }
    public static function timkiem($dt_ten, $dt_thuonghieu,$dt_gia_tu,$dt_gia_den,$hdn_nguoidung)
    {
        if ($dt_thuonghieu==null||$dt_gia_tu==null||$dt_gia_den==null||$hdn_nguoidung===null)
        {
            $dt_thuonghieu == '';
            return \DB::table('dienthoai')->join('hoadonnhap', 'dt_hdn', '=', 'hdn_maso')->join('nguoidung', 'hdn_nguoidung', '=', 'nd_maso')
                ->where('dt_ten', 'like', '%' . $dt_ten . '%')->orderBy('hdn_tgian', 'desc')->paginate(1, ['*'], 'page_dt');
        }
        if ($dt_thuonghieu=='0')
            return \DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->join('nguoidung','hdn_nguoidung','=','nd_maso')
                ->where([['dt_ten','like','%'.$dt_ten.'%'],['dt_gia','>=',$dt_gia_tu],['dt_gia','<=',$dt_gia_den],['hdn_nguoidung','like','%'.$hdn_nguoidung.'%']])
                ->orderBy('hdn_tgian','desc')->paginate(1,['*'],'page_dt');
        return \DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->join('nguoidung','hdn_nguoidung','=','nd_maso')
            ->where([['dt_ten','like','%'.$dt_ten.'%'],['dt_thuonghieu','=',$dt_thuonghieu],['dt_gia','>=',$dt_gia_tu],['dt_gia','<=',$dt_gia_den],['hdn_nguoidung','like','%'.$hdn_nguoidung.'%']])
            ->orderBy('hdn_tgian','desc')->paginate(1,['*'],'page_dt');
    }
    public static function thongke()
    {
        return \DB::table('dienthoai')->join('thuonghieu','dt_thuonghieu','=','th_maso')->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')->leftJoin('cthoadon','cthd_dienthoai','=','dt_maso')->select(\DB::raw('*,ifnull(sum(cthd_soluong),0) as dt_ban'))->groupBy('dt_maso')->orderBy('hdn_tgian')->paginate(1,['*'],'page_tk');
    }
    public static function thongke_nguoiban($nd_maso)
    {
        return \DB::table('dienthoai')->join('thuonghieu','dt_thuonghieu','=','th_maso')->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')->leftJoin('cthoadon','cthd_dienthoai','=','dt_maso')->select(\DB::raw('*,ifnull(sum(cthd_soluong),0) as dt_ban'))->where('hdn_nguoidung','=',$nd_maso)->groupBy('dt_maso')->orderBy('hdn_tgian')->paginate(1,['*'],'page_tk');
    }
}
