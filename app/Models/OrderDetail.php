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
        $this->belongsTo(ProductDetail::class);
    }

    public function order()
    {
        $this->belongsTo(Order::class);
    }
}
