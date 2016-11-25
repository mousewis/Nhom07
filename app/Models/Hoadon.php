<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model {

    protected $table = 'hoadon';

    public $timestamps = false;

    protected $fillable = ['hd_maso','hd_nguoimua','hd_nguoinhan', 'hd_soluong','hd_xuly','hd_hoantat','hd_huy', 'hd_gia', 'hd_tgian', 'hd_dchi', 'hd_sdt'];
    public static function nguoimua($hd_nguoimua,$hd_tinhtrang = null)
    {
        if ($hd_tinhtrang == null)
            return \DB::table('hoadon')
            ->where(['hd_nguoimua'=>$hd_nguoimua])->orderBy('hd_tgian','desc')->paginate(10,['*'],'page_hd');
        return \DB::table('hoadon')
            ->where([['hd_nguoimua','=',$hd_nguoimua],$tinhtrang])->orderBy('hd_tgian','desc')->paginate(10,['*'],'page_hd');
    }
    public static function nguoimua_cthd($hd_maso)
    {
        return \DB::table('hoadon')->leftJoin('cthoadon','hd_maso','=','cthd_hoadon')
            ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
            ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
            ->leftJoin('nguoidung','hdn_nguoidung','=','nd_maso')
            ->where(['hd_maso'=>$hd_maso])->get();
    }


}
