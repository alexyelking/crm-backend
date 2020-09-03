<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\CreateRequest;
use App\Http\Requests\Clients\UpdateRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\Response;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::query()->limit(100)->get();
        return Response::ok(["data" => ClientResource::collection($clients)]);
    }

    public function show(Client $client)
    {
        return Response::ok(new ClientResource($client));
    }

    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->only(['name', 'email', 'phone']));
        return Response::ok(["client"=>$client]);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return Response::ok();
    }

    public function create(CreateRequest $request)
    {
        $client = Client::create($request->only(['name', 'email', 'phone']));
        return Response::ok(["client"=>$client]);
    }
}
