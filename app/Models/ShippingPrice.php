<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'price',
    ];

    public function orders()
    {
        $this->hasMany(Order::class);
    }
}
