<?php

namespace App\Models;

use App\Livewire\PersonalAccount;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'address',
        'full_name',
        'user_id',
        'total_price',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    public function productsData()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
