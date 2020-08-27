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
    /**
     * ClientsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ClientsControllerCreateRequest $request
     * @return
     */
    public function create(ClientsControllerCreateRequest $request)
    {
        $client = Client::create($request->all());
        return Response::ok([$client]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Client $client
     * @return mixed
     */
    public function read(Client $client)
    {
        return Response::ok([$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientsControllerUpdateRequest $request
     * @param Client $client
     * @return mixed
     */
    public function update(ClientsControllerUpdateRequest $request, Client $client)
    {
        $client->update($request->all());
        return Response::ok([$client]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return mixed
     * @throws \Exception
     */
    public function delete(Client $client)
    {
        $client->delete();
        return Response::ok();
    }


    /**
     * Display the specified resource.
     *
     * @return mixed
     */
    public function showAll()
    {
        $clients = Client::all();
        return Response::ok([$clients]);
    }

}
