<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShippingPrice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()['is_admin']) {
            return redirect('/shipping_price');
        }

        $products = Product::with('productDetails')->get();
        return view('home', compact('products'));
    }

    public function getProductVariant(Product $product)
    {
        $option = '';
        foreach ($product->productDetails()->get() as $item) {
            $option .= "<option value='".$item['id']."'>".$product['name']." - ".$item['size']." (".$item['formatted_price']."/Kg)</option>";
        }
        $data = '<div class="row mb-3" id="product-variant-'.$product['id'].'">
                    <div class="col-8">
                        <select class="form-control" name="product_detail_id[]" required>
                        '.$option.'
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="number" min="1" class="form-control" name="amount[]" required>
                    </div>
                    <div class="col-1">
                        <button onclick="$(\'#product-variant-'.$product['id'].'\').remove()" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                    </div>
                </div>';
        return [
            "success"=>true,
            "message"=>null,
            "data"=>$data
        ];
    }

    public function order(Request $request)
    {
        $currentUser = $request->user();
        $orders = $currentUser->orders()->where('status','<>','draft')->get();
        return view('order.index', compact('orders'));
    }

    public function createOrder(Request $request)
    {
        $currentUser = $request->user();
        $draftOrder = $currentUser->orders()->where('status', 'draft')->firstOrCreate([
            'user_id' => $currentUser['id'],
            'status' => 'draft'
        ]);

        $products = Product::with('productDetails')->get();
        $shippingPrices = ShippingPrice::all();
        return view('order.create', compact('products', 'shippingPrices', 'draftOrder'));
    }
}
