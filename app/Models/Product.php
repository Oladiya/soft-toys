<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'brand',
        'view',
        'type',
        'design_and_construction',
        'size',
        'category',
        'img_uri',
        'description',
    ];
}
