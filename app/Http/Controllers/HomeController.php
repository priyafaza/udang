<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ShippingPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            return redirect('/order');
        }

        $products = Product::with('productDetails')->get();
        return view('home', compact('products'));
    }

    public function order(Request $request)
    {
        $currentUser = $request->user();
        $orders = $currentUser->orders()->where('status', '<>', 'draft')->get();
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
        $cart = Cart::all();

        return view('order.create', compact('products', 'shippingPrices', 'draftOrder', 'cart'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $product = Product::findOrFail($request['product_id']);
        $productDetails = $product->productDetails()->get()->toArray();
        $cart = new Cart();
        $cart->create([
            'product' => $product->toArray(),
            'productDetails' => $productDetails,
            'product_detail_id' => null,
            'amount' => 1
        ]);

        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        $cart = new Cart();
        $cart->delete($id);

        return redirect()->back();
    }

    public function submitOrder(Request $request)
    {
        $request->validate([
            'product_detail_id'=>'required',
            'amount'=>'required',
            'shipping_address'=>'required|string',
            'shipping_price_id' => 'required|exists:shipping_prices,id'
        ]);

        for($i = 0; $i < count($request['product_detail_id']); $i++) {
            $productDetail = ProductDetail::find($request['product_detail_id'][$i]);
            if($productDetail['stock'] < $request['amount'][$i]){
                return redirect()->back()->withErrors('Stock product '.$productDetail->product['name'].' - '.$productDetail['size'].' only '.$productDetail['stock'].' left');
            }
        }
        DB::transaction(function () use($request) {
            $currentUser = $request->user();
            $order = $currentUser->orders()->where('status', 'draft')->first();
            $order['shipping_price_id'] = $request['shipping_price_id'];
            $order['shipping_address'] = $request['shipping_address'];
            $order['status'] = $order->nextStatus();
            $order->save();

            for ($i = 0; $i < count($request['product_detail_id']); $i++) {
                $productDetail = ProductDetail::find($request['product_detail_id'][$i]);
                $order->orderDetails()->create([
                    'product_detail_id' => $request['product_detail_id'][$i],
                    'amount' => $request['amount'][$i],
                    'price' => $productDetail['price']
                ]);
                $productDetail['stock'] -= $request['amount'][$i];
                $productDetail->save();
            }
        });

        $cart = new Cart();
        $cart->destroy();

        return redirect('my/order')->withMessage('Order created');
    }

    public function orderDetail(Order $order)
    {
        return view('order.show', compact('order'));
    }
}
