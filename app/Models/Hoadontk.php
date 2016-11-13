<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoadontk extends Model {
	
    protected $table = 'hoadontk';
	
    public $timestamps = false;
	
	protected $fillable = ['hdtk_nguoidung', 'hdtk_tgian', 'hdtk_gia'];

}
