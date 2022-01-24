<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id', 'qty', 'sub_total', 'vat', 'total', 'pay', 'due', 'pay_by', 'order_date', 'order_month', 'order_year'
    ];
}
