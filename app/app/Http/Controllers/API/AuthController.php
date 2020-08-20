<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function index()
    {
        return Response::ok(["ind1" => "value"]);
    }
}
