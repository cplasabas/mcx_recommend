<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

	$users = User::all();
	$orders = DB::table('orders')
                ->select(DB::raw('orders.user_id,products.name, count(orders.product_id) as count'))
                ->leftJoin('products', 'orders.product_id', '=', 'products.id')
                ->groupBy('orders.user_id', 'products.name')
                ->get();
    $products = Product::limit(10)->get();

    return view('index')->with('users',$users)->with('orders',$orders)->with('products',$products);
});
