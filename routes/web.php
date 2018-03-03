<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

	// $users = User::all();
	// $orders = DB::table('orders')
 //                ->select(DB::raw('orders.user_id,products.name, count(orders.product_id) as count'))
 //                ->leftJoin('products', 'orders.product_id', '=', 'products.id')
 //                ->groupBy('orders.user_id', 'products.name')
 //                ->get();
 //    $products = Product::limit(10)->get();
 //    $promotions = Promotion::all();

 //    return view('index')->with('users',$users)->with('orders',$orders)->with('products',$products);
	return view('index');
});


Route::get('/recommend', function () {

	$users = User::all();
	$orders = DB::table('orders')
                ->select(DB::raw('orders.user_id,products.name, count(orders.product_id) as count'))
                ->leftJoin('products', 'orders.product_id', '=', 'products.id')
                ->groupBy('orders.user_id', 'products.name')
                ->get();
    $products = Product::limit(10)->get();
    $promotions = Promotion::all();

    ob_start();
	system('cd c:/flink/bin && flink run c:/mcx.jar', $return);
	ob_clean();

    $promotion_file = file_get_contents("c:/flink_output/recommendations");

    preg_match_all("/\(([^\)]*)\)/", $promotion_file, $matches);

    $matches = $matches[1];

    $recommendations = [];

    foreach ($matches as $m) {
    	$final = explode(",",$m);
        $final[0] = intval($final[0]);
        $final[1] = intval($final[1]);
        $final[2] = floatval($final[2]);
    	array_push($recommendations,$final);
    }

    return view('index')->with('users',$users)->with('orders',$orders)->with('products',$products)->with('promotions',$promotions)->with('recommendations',$recommendations);
});
