<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class recommendationController extends Controller
{
    public function recommend(Request $request){
        ob_start();
        system('cd c:/flink/bin && flink run c:/mcx.jar', $return);
        ob_clean();

        $promotion_file = file_get_contents("c:/flink_output/recommendations");

        preg_match_all("/\(([^\)]*)\)/", $promotion_file, $matches);

        $matches = $matches[1];

        $recommendations = [];

        foreach ($matches as $m) {
            $m_expload = explode(",",$m);

            $final =    [
                            "user_id" => intval($m_expload[0]),
                            "product_id" => intval($m_expload[1]),
                            "rating" => floatval($m_expload[2]),
                        ];

            array_push($recommendations,$final);
        }

        return $recommendations;
    }
}