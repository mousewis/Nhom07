<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model {
	
    protected $table = 'nguoidung';
	
    public $timestamps = false;
	
	protected $fillable = ['nd_email', 'nd_matkhau', 'nd_hoten', 'nd_sdt', 'nd_dchi', 'nd_loai', 'nd_taikhoan', 'nd_tinhtrang', 'nd_danhgia', 'nd_kichhoat'];

}
