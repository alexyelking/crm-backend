<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CreateRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Http\Resources\Client\ClientDataResource;
use App\Http\Resources\Client\ClientMetaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::paginate($request->limit);
        return Response::ok(["data" => ClientDataResource::collection($clients), "meta" => new ClientMetaResource($clients)]);
    }

    public function show(Client $client)
    {
        return Response::ok(["client" => new ClientDataResource($client)]);
    }

    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->only(['name', 'email', 'phone']));
        return Response::ok(["client" => new ClientDataResource($client)]);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return Response::ok();
    }

    public function create(CreateRequest $request)
    {
        $client = Client::create($request->only(['name', 'email', 'phone']));
        return Response::ok(["client" => new ClientDataResource($client)]);
    }
}