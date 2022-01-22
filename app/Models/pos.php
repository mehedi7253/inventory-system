<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pos extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'pos';
    protected $fillable = [
        'pro_id', 'pro_name', 'pro_quantity', 'product_price', 'sub_total'
    ];
}
