<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'expenses';
    protected $fillable = [
        'details', 'amount', 'expense_date'
    ];
}
