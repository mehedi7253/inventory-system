<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'employees';
    protected $fillable = [
        'name', 'email', 'phone','salary','address', 'nid', 'photo', 'joinig_date'
    ];
}
