<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Quantri extends Model {

    protected $table = 'quantri';

    public $timestamps = false;

	protected $fillable = ['qt_email', 'qt_matkhau'];

}
