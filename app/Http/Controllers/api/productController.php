<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class productController extends Controller
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
    	$data = Product::all();

        return $data;
    }

    public function show($id){
        $data = Product::find($id);

        return $data;
    }
}