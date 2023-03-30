<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMessage extends Model
{	
	public $fillable = ['*'];
    protected $table = "admin_messages";
    protected $guarded = [];
}