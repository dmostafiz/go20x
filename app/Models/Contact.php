<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    // public function sponsor(){
    //     return $this->hasOne(Contact::class, 'id', 'sponsor_id');
    // }

    // public function parent(){
    //     return $this->hasOne(Contact::class, 'id', 'user_id');
    // }

}
