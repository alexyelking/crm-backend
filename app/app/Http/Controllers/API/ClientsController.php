<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Client\CreateRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Http\Resources\ClientMetaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\ClientResource;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller
{
    /*
    public function index()
    {
        $clients = Client::query()->limit(100)->get();
        return Response::ok(["data" => ClientResource::collection($clients)]);
    }
    */

    public function index(Request $request)
    {
        $clients = Client::paginate($request->limit);
        return Response::ok(["data" => ClientResource::collection($clients), "meta" => new ClientMetaResource($clients)]);
    }

    public function show(Client $client)
    {
        return Response::ok(["client" => new ClientResource($client)]);
    }

    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->only(['name', 'email', 'phone']));
        return Response::ok(["client" => new ClientResource($client)]);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return Response::ok();
    }

    public function create(CreateRequest $request)
    {
        $client = Client::create($request->only(['name', 'email', 'phone']));
        return Response::ok(["client" => new ClientResource($client)]);
    }
}