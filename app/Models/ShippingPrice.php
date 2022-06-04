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
        return $this->hasMany(Order::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp.' . number_format($this['price'],0,'',',') . ',-';
    }
}
