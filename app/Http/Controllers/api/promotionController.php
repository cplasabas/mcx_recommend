<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotion;

class promotionController extends Controller
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
    	$data = Promotion::all();

        return $data;
    }

    public function show($id){
        $data = Promotion::find($id);

        return $data;
    }

    public function getPromotionProduct($id){
        $data = Promotion::with('product')->find($id);

        return $data;
    }
}