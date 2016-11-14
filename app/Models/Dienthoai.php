<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Dienthoai extends Model {
	
    protected $table = 'dienthoai';
	
    public $timestamps = false;
	
	protected $fillable = ['dt_ten', 'dt_hdn', 'dt_sluong', 'dt_thuonghieu', 'dt_gia', 'dt_hinh', 'dt_loai', 'dt_kco', 'dt_pgiai', 'dt_pin', 'dt_hdh', 'dt_ram', 'dt_bnho', 'dt_cam'];

    public static  function getList()
    {

        return DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->paginate(12);
    }
    public static  function getthuonghieu($th_maso)
    {
        return DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->where('dt_thuonghieu','=',$th_maso)->paginate(12);
    }
    public static function chitiet($dt_maso)
    {
        return DB::table('dienthoai')->join('hoadonnhap','dt_hdn','=','hdn_maso')->join('thuonghieu','dt_thuonghieu','=','th_maso')->where('dt_maso','=',$dt_maso)->first();
    }
}
