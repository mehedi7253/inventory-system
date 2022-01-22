<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class extra extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'extras';
    protected $fillable = [
        'vat', 'logo', 'fv_icon', 'phone', 'email', 'address'
    ];
}
