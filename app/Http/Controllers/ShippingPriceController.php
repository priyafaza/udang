<?php

namespace App\Http\Controllers;

use App\Models\ShippingPrice;
use Illuminate\Http\Request;

class ShippingPriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function show(ShippingPrice $shippingPrice)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(ShippingPrice $shippingPrice)
    {

    }

    public function update(ShippingPrice $shippingPrice, Request $request)
    {

    }

    public function destroy(ShippingPrice $shippingPrice)
    {

    }
}
