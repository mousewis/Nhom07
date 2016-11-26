<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoadontk extends Model {
	
    protected $table = 'hoadontk';
	
    public $timestamps = false;
	
	protected $fillable = ['hdtk_nguoidung', 'hdtk_tgian', 'hdtk_gia'];
    public static function getall($col = null, $type = null,$hdtk_tgian_tu = null,$hdtk_tgian_den = null,$hdtk_gia_tu = null, $hdtk_gia_den=null, $hdtk_nguoidung = null)
    {
        if (($col == null)||($col==''))
            $col = 'hdtk_tgian';
        if (($type == null)||($type==''))
            $type = 'desc';
        if (($hdtk_tgian_tu == null)||($hdtk_tgian_tu==''))
            $hdtk_tgian_tu = '2010-01-01';
        if (($hdtk_tgian_den == null)||($hdtk_tgian_den==''))
            $hdtk_tgian_den = '2020-01-01';
        if (($hdtk_gia_tu == null)||($hdtk_gia_tu==''))
            $hdtk_gia_tu = '0';
        if (($hdtk_gia_den == null)||($hdtk_gia_den==''))
            $hdtk_gia_den = '10000000';
        if (($hdtk_nguoidung == null)||($hdtk_nguoidung==''))
            $hdtk_nguoidung = '';
        return \DB::table('hoadontk')->where([['hdtk_tgian','>=',$hdtk_tgian_tu],['hdtk_tgian','<=',$hdtk_tgian_den],
            ['hdtk_gia','>=',$hdtk_gia_tu],['hdtk_gia','<=',$hdtk_gia_den],['hdtk_nguoidung','like','%'.$hdtk_nguoidung.'%']])
            ->orderBy($col,$type)->paginate(15,['*'],'page_hdtk');
    }
    public static function count($col = null, $type = null,$hdtk_tgian_tu = null,$hdtk_tgian_den = null,$hdtk_gia_tu = null, $hdtk_gia_den=null, $hdtk_nguoidung = null)
    {
        if (($col == null)||($col==''))
            $col = 'hdtk_tgian';
        if (($type == null)||($type==''))
            $type = 'desc';
        if (($hdtk_tgian_tu == null)||($hdtk_tgian_tu==''))
            $hdtk_tgian_tu = '2010-01-01';
        if (($hdtk_tgian_den == null)||($hdtk_tgian_den==''))
            $hdtk_tgian_den = '2020-01-01';
        if (($hdtk_gia_tu == null)||($hdtk_gia_tu==''))
            $hdtk_gia_tu = '0';
        if (($hdtk_gia_den == null)||($hdtk_gia_den==''))
            $hdtk_gia_den = '10000000';
        if (($hdtk_nguoidung == null)||($hdtk_nguoidung==''))
            $hdtk_nguoidung = '';
        return \DB::table('hoadontk')->where([['hdtk_tgian','>=',$hdtk_tgian_tu],['hdtk_tgian','<=',$hdtk_tgian_den],
            ['hdtk_gia','>=',$hdtk_gia_tu],['hdtk_gia','<=',$hdtk_gia_den],['hdtk_nguoidung','like','%'.$hdtk_nguoidung.'%']])
            ->count('*');
    }
    public static function sum($col = null, $type = null,$hdtk_tgian_tu = null,$hdtk_tgian_den = null,$hdtk_gia_tu = null, $hdtk_gia_den=null, $hdtk_nguoidung = null)
    {
        if (($col == null)||($col==''))
            $col = 'hdtk_tgian';
        if (($type == null)||($type==''))
            $type = 'desc';
        if (($hdtk_tgian_tu == null)||($hdtk_tgian_tu==''))
            $hdtk_tgian_tu = '2010-01-01';
        if (($hdtk_tgian_den == null)||($hdtk_tgian_den==''))
            $hdtk_tgian_den = '2020-01-01';
        if (($hdtk_gia_tu == null)||($hdtk_gia_tu==''))
            $hdtk_gia_tu = '0';
        if (($hdtk_gia_den == null)||($hdtk_gia_den==''))
            $hdtk_gia_den = '10000000';
        if (($hdtk_nguoidung == null)||($hdtk_nguoidung==''))
            $hdtk_nguoidung = '';
        return \DB::table('hoadontk')->where([['hdtk_tgian','>=',$hdtk_tgian_tu],['hdtk_tgian','<=',$hdtk_tgian_den],
            ['hdtk_gia','>=',$hdtk_gia_tu],['hdtk_gia','<=',$hdtk_gia_den],['hdtk_nguoidung','like','%'.$hdtk_nguoidung.'%']])
            ->sum('hdtk_gia');
    }

}
