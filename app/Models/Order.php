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
        'draft',
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
        return $this->belongsTo(ShippingPrice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
