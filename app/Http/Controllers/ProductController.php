<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'summary' => 'required',
            'description' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:200'
        ]);

        $product = new Product;
        $product['name'] = $request['name'];
        $product['summary'] = $request['summary'];
        $product['description'] = $request['description'];
        $image_path = null;
        if ($request->file('image') != '') {
            $main_image = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/images/profile'), $main_image);
            $image_path = '/storage/images/profile/' . $main_image;
        }
        $product['image'] = $image_path;
        $product->save();

        return redirect()->back()->withMessage('Product created');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function addVariant(Product $product, Request $request)
    {
        $request->validate([
            'size'=>'required|integer',
            'stock'=>'required|integer',
            'price'=>'required|integer',
        ]);

        $productDetails = $product->productDetails()->where('size',$request['size'])->firstOrNew();
        $productDetails['size'] = $request['size'];
        $productDetails['stock'] = $request['stock'];
        $productDetails['price'] = $request['price'];
        $productDetails->save();

        return redirect()->back()->withMessage('Product Variant created');
    }

    public function removeVariant(ProductDetail $productDetail)
    {
        if($productDetail->orderDetails()->count() == 0) {
            $productDetail->delete();
            return redirect()->back()->withMessage('Product Variant deleted');
        }
        return redirect()->back()->withMessage('Product Variant has in order details, can\'t deleted');
    }

    public function updateVariant(Request $request, ProductDetail $productDetail)
    {
        $request->validate([
            'stock'=>'required|integer|min:1'
        ]);

        $productDetail['stock'] = $request['stock'];
        $productDetail->save();

        return redirect()->back()->withMessage('Product Variant stocks been updated');
    }
}
