<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buy extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'image',
        'note',
        'price',
        'name',
        'phone',
        'address',
        'status',
    ];
}
