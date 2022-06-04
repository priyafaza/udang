<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_address',
        'status',
    ];

    const STATUS_OPTION =  [
        'pending_payment',
        'success_payment',
        'processing',
        'packaging',
        'shipping',
        'delivered',
        'done',
    ];

    public function shippingPrice()
    {
        $this->belongsTo(ShippingPrice::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        $this->hasMany(OrderDetail::class);
    }
}
