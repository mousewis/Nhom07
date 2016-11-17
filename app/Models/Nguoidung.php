<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model {
	
    protected $table = 'nguoidung';
	
    public $timestamps = false;
	
	protected $fillable = ['nd_maso','nd_email', 'nd_matkhau', 'nd_hoten', 'nd_sdt', 'nd_dchi', 'nd_loai', 'nd_taikhoan', 'nd_tinhtrang', 'nd_danhgia', 'nd_kichhoat'];
    public static function _dangnhap($nd_maso, $nd_matkhau)
    {
        $result = \DB::table('nguoidung')->where([['nd_maso','=',$nd_maso],['nd_matkhau','=',$nd_matkhau],])->first();
            return $result;
    }
    public static function nguoiban()
    {
        $result = \DB::table('nguoidung')->where('nd_loai','=','1')->get();
        return $result;
    }
    public static function chitiet_nguoimua($nd_maso)
    {
        $result = \DB::table('nguoidung')->where([['nd_loai','=','2'],['nd_maso','=',$nd_maso],])->first();
        return $result;
    }
    public static function chitiet_nguoiban($nd_maso)
    {
        $result = \DB::table('nguoidung')->where([['nd_loai','=','1'],['nd_maso','=',$nd_maso],])->first();
        return $result;
    }
}
