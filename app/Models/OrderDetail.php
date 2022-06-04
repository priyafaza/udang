<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'price',
    ];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
