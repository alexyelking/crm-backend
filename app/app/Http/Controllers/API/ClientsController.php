<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsControllerCreateRequest;
use App\Http\Requests\ClientsControllerUpdateRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return Response::ok([$clients]);
    }

    public function show(Client $client)
    {
        return Response::ok([$client]);
    }

    public function update(ClientsControllerUpdateRequest $request, Client $client)
    {
        $client->update($request->all());
        return Response::ok([$client]);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return Response::ok();
    }

    public function create(ClientsControllerCreateRequest $request)
    {
        $client = Client::create($request->all());
        return Response::ok([$client]);
    }
}
