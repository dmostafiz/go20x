<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingLabelTracking extends Model
{
    use HasFactory;
      
    protected $guarded = [];
    public $timestamps = false;

    public function orderDetail()
    { 
        return $this->belongsTo(OrderDetail::class,'id','order_detail_id');
    }
    
}