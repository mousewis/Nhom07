<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cthoadon extends Model {
	
    protected $table = 'cthoadon';
	
    public $timestamps = false;
	
	protected $fillable = ['cthd_soluong', 'cthd_gia', 'cthd_tinhtrang'];

}
