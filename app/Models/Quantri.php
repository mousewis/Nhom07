<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Quantri extends Model {

    protected $table = 'quantri';

    public $timestamps = false;

	protected $fillable = ['qt_email', 'qt_matkhau'];
    public static function _dangnhap($qt_maso, $qt_matkhau)
    {

        $result = \DB::table('quantri')->where([['qt_maso','=',$qt_maso],['qt_matkhau','=',$qt_matkhau],])->first();
        return $result;
    }
    public static function chitiet_nguoimua($qt_maso)
    {
        $result = DB::table('nguoidung')->where([['nd_loai','=','2'],['nd_maso','=',$nd_maso],])->first();
        return $result;
    }
    public static function chitiet_nguoiban($qt_maso)
    {
        $result = DB::table('nguoidung')->where([['nd_loai','=','1'],['nd_maso','=',$nd_maso],])->first();
        return $result;
    }
}
