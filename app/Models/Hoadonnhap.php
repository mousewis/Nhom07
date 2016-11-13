<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoadonnhap extends Model {
	
    protected $table = 'hoadonnhap';
	
    public $timestamps = false;
	
	protected $fillable = ['hdn_nguoidung', 'hdn_tgian', 'hdn_gia'];

}
