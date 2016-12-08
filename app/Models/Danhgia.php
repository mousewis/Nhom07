<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model {
	
    protected $table = 'danhgia';
	
    public $timestamps = false;
	
	protected $fillable = ['dg_hoadon','dg_tgian','dg_nguoimua', 'dg_nguoiban', 'dg_diem'];
    public static function getall()
    {
        $result = \DB::table('danhgia')->paginate(15,['*'],'page_dg');
        return $result;
    }
    public static function luot_danhgia($nd_maso)
    {
        $result = \DB::table('danhgia')->where('dg_nguoiban','=',$nd_maso)->count('*');
        return $result;
    }
    public static function nguoimua_danhgia($nd_maso)
    {
        $result = \DB::table('danhgia')->where('dg_nguoimua','=',$nd_maso)->paginate(10,['*'],'page_dg');
        return $result;
    }
    public static function nguoiban_danhgia($nd_maso)
    {
        $result = \DB::table('danhgia')->where('dg_nguoiban','=',$nd_maso)->paginate(10,['*'],'page_dg');
        return $result;
    }
    public static function nguoimua($nd_maso)
    {
        return \DB::select(\DB::raw("
                        select hdn_nguoidung as nguoiban, hd_nguoimua as nguoimua,
                        hd_maso as hoadon, ifnull(count(dg_nguoimua),0) as danhgia 
                        from hoadon left join cthoadon on hd_maso = cthd_hoadon 
                        left join dienthoai on cthd_dienthoai = dt_maso 
                        left join hoadonnhap on hdn_maso = dt_hdn 
                        left join nguoidung on hdn_nguoidung = nd_maso 
                        left JOIN danhgia on dg_hoadon = hd_maso 
                        where hd_nguoimua='customerA' and cthd_tinhtrang = 2
                        group by hoadon"));
    }
    public static function capnhat_nguoiban($dg_nguoiban)
    {
        $luot_danhgia = \DB::table('nguoidung')->where('nd_maso','=',$dg_nguoiban)->value('nd_luotdanhgia')+1;
        $tong_danhgia = \DB::table('danhgia')->where('dg_nguoiban','=',$dg_nguoiban)->sum('dg_diem');
        \DB::table('nguoidung')->where('nd_maso','=',$dg_nguoiban)->update(['nd_luotdanhgia'=>($luot_danhgia),'nd_danhgia'=>number_format($tong_danhgia/$luot_danhgia,1)]);
        if (($luot_danhgia > 5)&& ($tong_danhgia/$luot_danhgia <= 2))
            {
                \DB::table('nguoidung')->where('nd_maso','=',$dg_nguoiban)->update(['nd_tinhtrang'=>'-1']);
                \DB::table('taikhoan')->insert(['tk_nguoidung'=>$dg_nguoiban,'tk_noidung'=>'-1','tk_ghichu'=>'Low Rate','tk_tgian'=>date('Y-m-d')]);
            }
    }

}
