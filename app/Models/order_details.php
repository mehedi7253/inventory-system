<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id', 'product_id', 'pro_quantity', 'product_price', 'sub_total'
    ];
}
