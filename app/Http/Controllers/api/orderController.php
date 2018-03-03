<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function store(Request $request){
         $user_id = $request->input('user_id');
         $product_id = $request->input('product_id');

         $order = new Order;
         $order->user_id = $user_id;
         $order->product_id = $product_id;

         $order->save();

        return response("Successfuly Created", 201);
    }

    public function update(Request $request){
        // To Do
    }

    public function deleteOrder($id){
    	$order = Order::find($id);
        $order->delete();

        return response("Successfuly Deleted", 200);
    }

    public function index(Request $request){
    	$data = Order::all();

        return $data;
    }

    public function getOrder($id){
        $data = Order::find($id);

        return $data;
    }

    public function getOrdersFull(Request $request){
        $data = DB::table('orders')
                ->select(DB::raw('orders.user_id,products.name, count(orders.product_id) as count'))
                ->leftJoin('products', 'orders.product_id', '=', 'products.id')
                ->groupBy('orders.user_id', 'products.name')
                ->get();

        return $data;
    }
}