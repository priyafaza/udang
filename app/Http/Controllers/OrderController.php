<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::with('orderDetails', 'shippingPrice', 'user')->get();
        return view('admin.order.index', compact('orders'));
    }

}
