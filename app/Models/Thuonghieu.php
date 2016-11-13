<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Thuonghieu extends Model {
	
    protected $table = 'thuonghieu';
	
    public $timestamps = false;
	
	protected $fillable = ['th_ten'];

}
