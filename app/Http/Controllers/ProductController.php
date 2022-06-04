<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
