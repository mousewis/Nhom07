<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model {
	
    protected $table = 'danhgia';
	
    public $timestamps = false;
	
	protected $fillable = ['dg_nguoimua', 'dg_nguoiban', 'dg_diem'];

}
