<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cthoadon extends Model {
	
    protected $table = 'cthoadon';
	
    public $timestamps = false;
	
	protected $fillable = ['cthd_hoadon','cthd_dienthoai','cthd_soluong', 'cthd_gia', 'cthd_tinhtrang'];
    public static function capnhat($cthd_maso, $cthd_tinhtrang)
    {
        \DB::table('cthoadon')->where('cthd_maso','=',$cthd_maso)->update(['cthd_tinhtrang'=>$cthd_tinhtrang]);
    }

}
