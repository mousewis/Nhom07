<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Thuonghieu extends Model {
	
    protected $table = 'taikhoan';
    protected $primaryKey = 'tk_maso';
	
    public $timestamps = false;
	
	protected $fillable = ['tk_nguoidung','tk_noidung','tk_ghichu','tk_tgian'];

}
