<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProgressResource;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return Response::ok(["progress" => new ProgressResource($this)]);
    }
}