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
        if ($hd_tinhtrang=='-1')
            return \DB::table('hoadon')->where("hd_nguoimua","=",\DB::raw("'".$hd_nguoimua."' and hd_huy>0"))->orderBy('hd_tgian','desc')->paginate(10,['*'],'page_hd');
        if ($hd_tinhtrang=='0')
            return \DB::table('hoadon')->where("hd_nguoimua","=",\DB::raw("'".$hd_nguoimua."' and hd_soluong - hd_huy - hd_hoantat - hd_xuly > 0"))->orderBy('hd_tgian','desc')->paginate(10,['*'],'page_hd');
        if ($hd_tinhtrang=='1')
            return \DB::table('hoadon')->where("hd_nguoimua","=",\DB::raw("'".$hd_nguoimua."' and hd_xuly=(hd_soluong - hd_huy - hd_hoantat)"))->orderBy('hd_tgian','desc')->paginate(10,['*'],'page_hd');
        if ($hd_tinhtrang=='2')
            return \DB::table('hoadon')->where("hd_nguoimua","=",\DB::raw("'".$hd_nguoimua."' and hd_hoantat=(hd_soluong - hd_huy)" ))->orderBy('hd_tgian','desc')->paginate(10,['*'],'page_hd');
    }
    public static function nguoimua_cthd($hd_maso)
    {
        return \DB::table('hoadon')->leftJoin('cthoadon','hd_maso','=','cthd_hoadon')
            ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
            ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
            ->leftJoin('nguoidung','hdn_nguoidung','=','nd_maso')
            ->where(['hd_maso'=>$hd_maso])->get();
    }
    public static  function capnhat_cthd($cthd_maso,$cthd_tinhtrang, $cthd_hoadon)
    {
        \DB::table('cthoadon')->where('cthd_maso','=',$cthd_maso)->update(["cthd_tinhtrang"=>$cthd_tinhtrang]);
        $hd_xuly = \DB::table('cthoadon')->where([["cthd_hoadon"=>$cthd_hoadon],["cthd_tinhtrang"=>'1']])->count();
        $hd_hoantat = \DB::table('cthoadon')->where([["cthd_hoadon"=>$cthd_hoadon],["cthd_tinhtrang"=>'2']])->count();
        $hd_huy = \DB::table('cthoadon')->where([["cthd_hoadon"=>$cthd_hoadon],["cthd_tinhtrang"=>'-1']])->count();
        \DB::table('hoadon')->where('hd_maso','=',$cthd_hoadon)->update([["hd_xuly"=>$hd_xuly],["hd_hoantat"=>$hd_hoantat],["hd_huy"=>$hd_huy]]);
    }

}
