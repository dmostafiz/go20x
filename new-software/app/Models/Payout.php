<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $table = "payout";
    protected $guarded = ['id'];

    protected $casts = [
        'withdraw_information' => 'object'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'id');
    }

    // public function method()
    // {
    //     return $this->belongsTo(WithdrawMethod::class, 'method_id');
    // }

    public function scopePending()
    {
        return $this->where('cleared', 0);
    }

    public function scopeApproved()
    {
        return $this->where('cleared', 1);
    }

    public function scopeRejected()
    {
        return $this->where('cleared', 3);
    }
}
