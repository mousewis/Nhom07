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
    public static function nguoiban($hd_nguoiban,$hd_tinhtrang = null,$col = null, $type = null, $hd_tgian_tu =null,$hd_tgian_den = null,$hd_dchi = null, $cthd_tinhtrang =null )
    {
        if (($col==null)||($col==''))
            $col = 'hd_tgian';
        if (($type==null)||($type==''))
            $type = 'desc';
        if ($hd_tgian_tu == null)
            $hd_tgian_tu = '2010-01-01';
        if ($hd_tgian_den == null)
            $hd_tgian_den = '2020-01-01';
        if ($hd_dchi == null)
            $hd_dchi = '';
        if ($hd_tinhtrang != null)
            return \DB::table('cthoadon')
                ->leftJoin('hoadon','cthd_hoadon','=','hd_maso')
                ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
                ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
                ->where([['hdn_nguoidung','=',$hd_nguoiban],
                    ['cthd_tinhtrang','=',$hd_tinhtrang],
                ])->orderBy($col,$type)->paginate(10,['*'],'page_cthd');
        if (($cthd_tinhtrang == null)||($cthd_tinhtrang == ''))
            return \DB::table('cthoadon')
                ->leftJoin('hoadon','cthd_hoadon','=','hd_maso')
                ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
                ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
                ->where([['hdn_nguoidung','=',$hd_nguoiban],
                    ['hd_tgian','>=',$hd_tgian_tu],
                    ['hd_tgian','<=',$hd_tgian_den],
                    ['hd_dchi','like','%'.$hd_dchi.'%'],
                ])->orderBy($col,$type)->paginate(10,['*'],'page_cthd');
        return \DB::table('cthoadon')
                ->leftJoin('hoadon','cthd_hoadon','=','hd_maso')
                ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
                ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
                ->where([['hdn_nguoidung','=',$hd_nguoiban],
                    ['cthd_tinhtrang','=',$cthd_tinhtrang],
                    ['hd_tgian','>=',$hd_tgian_tu],
                    ['hd_tgian','<=',$hd_tgian_den],
                    ['hd_dchi','like','%'.trim($hd_dchi).'%'],
                ])->orderBy($col,$type)->paginate(10,['*'],'page_cthd');
    }
    public static function nguoimua_cthd($hd_maso)
    {
        return \DB::table('hoadon')->leftJoin('cthoadon','hd_maso','=','cthd_hoadon')
            ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
            ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
            ->leftJoin('nguoidung','hdn_nguoidung','=','nd_maso')
            ->where(['hd_maso'=>$hd_maso])->get();
    }
    public static function nguoiban_cthd($hd_nguoiban, $hd_maso)
    {
        return \DB::table('cthoadon')
            ->leftJoin('hoadon','cthd_hoadon','=','hd_maso')
            ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
            ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
            ->where(['hdn_nguoidung'=>$hd_nguoiban,'hd_maso'=>$hd_maso])->get();
    }
    public static  function capnhat_cthd($cthd_maso,$cthd_tinhtrang, $cthd_hoadon)
    {
        \DB::table('cthoadon')->where('cthd_maso','=',$cthd_maso)->update(["cthd_tinhtrang"=>$cthd_tinhtrang]);
        $hd_xuly = \DB::table('cthoadon')->where(["cthd_hoadon"=>$cthd_hoadon,"cthd_tinhtrang"=>'1'])->count();
        $hd_hoantat = \DB::table('cthoadon')->where(["cthd_hoadon"=>$cthd_hoadon,"cthd_tinhtrang"=>'2'])->count();
        $hd_huy = \DB::table('cthoadon')->where(["cthd_hoadon"=>$cthd_hoadon,"cthd_tinhtrang"=>'-1'])->count();
        \DB::table('hoadon')->where('hd_maso','=',$cthd_hoadon)->update(["hd_xuly"=>$hd_xuly,"hd_hoantat"=>$hd_hoantat,"hd_huy"=>$hd_huy]);
    }

}
