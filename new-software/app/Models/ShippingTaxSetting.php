<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingTaxSetting extends Model
{
    use HasFactory;
    protected $table = 'shipping_tax_settings';  
    protected $guarded = [];
    public $timestamps = false;
}