<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model {
	
    protected $table = 'hoadon';
	
    public $timestamps = false;
	
	protected $fillable = ['hd_nguoimua','hd_nguoinhan', 'hd_tinhtrang', 'hd_gia', 'hd_tgian', 'hd_dchi', 'hd_sdt'];

}
