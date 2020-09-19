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
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $clients = Client::paginate($request->limit);
        return Response::ok(["data" => ClientDataResource::collection($clients), "meta" => new ClientMetaResource($clients)]);
    }

    /**
     * @param CreateRequest $request
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        $client = Client::create($request->only(['name', 'email', 'phone']));
        return Response::ok(["client" => new ClientDataResource($client)]);
    }

    /**
     * @param Client $client
     * @return mixed
     */
    public function show(Client $client)
    {
        return Response::ok(["client" => new ClientDataResource($client)]);
    }

    /**
     * @param UpdateRequest $request
     * @param Client $client
     * @return mixed
     */
    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->only(['name', 'email', 'phone']));
        return Response::ok(["client" => new ClientDataResource($client)]);
    }

    /**
     * @param Client $client
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return Response::ok();
    }
}