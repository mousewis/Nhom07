<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoadonnhap extends Model {
	
    protected $table = 'hoadonnhap';
	
    public $timestamps = false;
	
	protected $fillable = ['hdn_maso','hdn_nguoidung', 'hdn_tgian', 'hdn_gia'];
    public static function nguoiban($hdn_nguoidung, $col = null, $type = null)
    {
        if ($col == null)
            $col = 'hdn_tgian';
        if ($type == null)
            $type = 'desc';
        return \DB::table('hoadonnhap')
            ->leftJoin('dienthoai','dt_hdn','=','hdn_maso')
            ->where('hdn_nguoidung','=',$hdn_nguoidung)
            ->orderBy($col, $type)->paginate(10,['*'],'page_hdn');
    }
    public static function getall($col = null, $type = null)
    {
        if (($col == null)||($col==''))
            $col = 'hdn_tgian';
        if (($type == null)||($type==''))
            $type = 'desc';
        return \DB::table('hoadonnhap')
            ->leftJoin('dienthoai','dt_hdn','=','hdn_maso')
            ->orderBy($col,$type)->paginate(15,['*'],'page_hdn');
    }
}
