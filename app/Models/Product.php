<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'summary',
        'description',
    ];

    public function productDetails()
    {
        $this->hasMany(ProductDetail::class);
    }
}
