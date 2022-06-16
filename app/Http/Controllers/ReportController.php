<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request['start_date']) && isset($request['end_date'])) {
            $orders = Order::where('status', 'done')
                ->where('created_at', '>=', $request['start_date'])
                ->where('created_at', '<=', $request['end_date'])
                ->get();
        } else {
            $orders = Order::where('status', 'done')->get();
        }
        return view('admin.report.index', compact('orders'));
    }
}
