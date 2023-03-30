<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    public $fillable = [
        'cv',
        'image',
        'product_name',
        'description',
        'length',
        'width',
        'height',
        'distance_unit',
        'weight',
        'mass_unit',
        'price',
        'country',
        'sku',
        'subscription_title',
        'landmark_description'
    ];
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class,'id');
    }
} 