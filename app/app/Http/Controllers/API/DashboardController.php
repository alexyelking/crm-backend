<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $a = mt_rand(1, 10);
        $b = mt_rand(70, 95);
        $c = mt_rand(3, 8);
        $d = mt_rand(10, 35);
        return Response::ok(["progress" => "$a/10, $b/100, $c/10, $d/100"]);
    }
}
