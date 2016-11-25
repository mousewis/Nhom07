<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model {
	
    protected $table = 'danhgia';
	
    public $timestamps = false;
	
	protected $fillable = ['dg_nguoimua', 'dg_nguoiban', 'dg_diem'];
    public static function luot_danhgia($nd_maso)
    {
        $result = \DB::table('danhgia')->where('dg_nguoiban','=',$nd_maso)->count('*');
        return $result;
    }
    public static function nguoimua_danhgia($nd_maso)
    {
        $result = \DB::table('danhgia')->where('dg_nguoiban','=',$nd_maso)->paginate(1,['*'],'page_dg');
        return $result;
    }
    public static function nguoimua($nd_maso)
    {
        return \DB::select(\DB::raw("select hdn_nguoidung as nguoiban, hd_nguoimua as nguoimua, hd_maso as hoadon, ifnull(count(dg_nguoimua),0) as danhgia from hoadon left join cthoadon on hd_maso = cthd_hoadon
                        left join dienthoai on cthd_dienthoai = dt_maso
                        left join hoadonnhap on hdn_maso = dt_maso
                        left join nguoidung on hdn_nguoidung = nd_maso
                        left JOIN danhgia on dg_nguoimua = hd_nguoimua
                        where hd_nguoimua='" .$nd_maso. "'
                        group by hoadon"))->get();
    }

}
