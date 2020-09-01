<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $a = mt_rand(1, 10)/10;
        $b = mt_rand(70, 95)/100;
        $c = mt_rand(3, 8)/10;
        $d = mt_rand(10, 35)/100;
        return Response::ok(["progress"=>["info" => "$a", "success" => "$b", "warning" => "$c", "danger" => "$d"]]);
    }
}
