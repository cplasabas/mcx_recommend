<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class userController extends Controller
{
    public function store(Request $request){
    	// To Do
    }

    public function update(Request $request){
        // To Do
    }

    public function destroy(Request $request){
    	// To Do
    }

    public function index(Request $request){
    	$data = User::all();

        return $data;
    }

    public function show($id){
        $data = User::find($id);

        return $data;
    }

    public function getUserOrders($id){
        $data = User::with('orders')->find($id);

        return $data;
    }
}