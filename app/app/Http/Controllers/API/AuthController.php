<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function index()
    {
        return Response::neok(["name" => "Sasha", "state" => "NE KZ in my skin"], "hello", ["errors" => "not found"]);
    }

    public function example()
    {
        return response()->json([
            'name' => 'Sasha',
            'state' => 'KZ',
        ]);
    }
}
