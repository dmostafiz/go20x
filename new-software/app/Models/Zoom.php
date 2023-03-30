<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{	
	public $fillable = ['*'];
    protected $table = "zoom";
    protected $guarded = [];
}