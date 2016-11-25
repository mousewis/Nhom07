<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model {
	
    protected $table = 'hoadon';
	
    public $timestamps = false;
	
	protected $fillable = ['hd_maso','hd_nguoimua','hd_nguoinhan', 'hd_tinhtrang', 'hd_gia', 'hd_tgian', 'hd_dchi', 'hd_sdt'];
    public static function nguoimua($hd_nguoimua)
    {
        return \DB::table('hoadon')->leftJoin('cthoadon','hd_maso','=','cthd_hoadon')
            ->leftJoin('dienthoai','cthd_dienthoai','=','dt_maso')
            ->leftJoin('hoadonnhap','dt_hdn','=','hdn_maso')
            ->leftJoin('nguoidung','hdn_nguoidung','=','nd_maso')
            ->where('hd_nguoimua','=',$hd_nguoimua)->orderBy('hd_tgian','desc')->paginate(10);
    }

}
