<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

	$users = User::all();
	$orders = DB::table('orders')
                ->select(DB::raw('orders.user_id,products.name, count(orders.product_id) as count'))
                ->leftJoin('products', 'orders.product_id', '=', 'products.id')
                ->groupBy('orders.user_id', 'products.name')
                ->get();
    $products = Product::limit(10)->get();
    $promotions = Promotion::all();

    return view('index')->with('users',$users)->with('orders',$orders)->with('products',$products);
});


Route::get('/recommend', function () {

	ob_start();
	system('cd c:/flink/bin && flink run c:/mcx.jar', $return);
	ob_clean();

	$users = User::all();
	$orders = DB::table('orders')
                ->select(DB::raw('orders.user_id,products.name, count(orders.product_id) as count'))
                ->leftJoin('products', 'orders.product_id', '=', 'products.id')
                ->groupBy('orders.user_id', 'products.name')
                ->get();
    $products = Product::limit(10)->get();
    $promotions = Promotion::all();

    $promotion_file = file_get_contents("c:/flink_output/recommendations");

    var_dump($promotion_file);

    return view('index')->with('users',$users)->with('orders',$orders)->with('products',$products)->with('promotions',$promotions);
});
