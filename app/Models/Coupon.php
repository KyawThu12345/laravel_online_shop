<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'code', 'coupon_type', 'coupon_value', 'cart_value', 'expiry_date'
    // ];
    protected $table = "coupons";
}
