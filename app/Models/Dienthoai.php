<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Dienthoai extends Model {
	
    protected $table = 'dienthoai';
	
    public $timestamps = false;
	
	protected $fillable = ['dt_ten', 'dt_hdn', 'dt_sluong', 'dt_thuonghieu', 'dt_gia', 'dt_hinh', 'dt_loai', 'dt_kco', 'dt_pgiai', 'dt_pin', 'dt_hdh', 'dt_ram', 'dt_bnho', 'dt_cam'];

}
