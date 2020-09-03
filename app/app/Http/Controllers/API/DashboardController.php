<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgressResource;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        return Response::ok(["progress" => new ProgressResource($this)]);
    }
}
