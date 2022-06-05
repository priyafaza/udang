<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingPriceController;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $min_price_product = ProductDetail::orderBy('price')->value('price');
    $products = Product::orderBy('id')->take(5)->get();
    return view('welcome', compact('min_price_product', 'products'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/my/order', [HomeController::class, 'order'])->name('my.order');
Route::get('/my/order/invoice/{order}', [HomeController::class, 'orderDetail'])->name('my.order.detail');
Route::get('/my/order/new', [HomeController::class, 'createOrder'])->name('my.order.new');
Route::post('/my/order/new', [HomeController::class, 'addProduct'])->name('my.order.new.addProduct');
Route::post('/add-to-cart', [HomeController::class, 'addToCart']);
Route::post('/remove-from-cart/{id}', [HomeController::class, 'removeFromCart']);
Route::post('/create-order', [HomeController::class, 'submitOrder']);

Route::group(['middleware' => ['is_admin']], function () {

    Route::apiResource('shipping_price', ShippingPriceController::class, [
        'only' => ['index', 'store', 'update', 'destroy'],
    ]);

    Route::apiResource('product', ProductController::class, [
        'only' => ['index', 'store', 'show'],
    ]);

    Route::post('product/{product}/add', [ProductController::class, 'addVariant'])->name('productVariant.add');
    Route::delete('product/removeVariant/{productDetail}', [ProductController::class, 'removeVariant'])->name('productVariant.remove');

    Route::apiResource('order', OrderController::class, [
        'only' => ['index', 'show'],
    ]);

    Route::post('order/{order}/update-status', [OrderController::class, 'updateStatus']);
});
