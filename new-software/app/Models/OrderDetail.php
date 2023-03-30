<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
      
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function gateway()
    {
        return $this->belongsTo(Gateway::class, 'method_code', 'code');
    }
    public function product()
    {
        return $this->belongsTo(Products::class,'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tracking()
    {
        return $this->hasMany(ShippingLabelTracking::class,'order_detail_id','id');
    }

}