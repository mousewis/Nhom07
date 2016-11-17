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

}
