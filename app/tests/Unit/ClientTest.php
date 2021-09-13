<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ClientTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->json('GET', '/api/clients', ['limit' => '10', 'page' => '1', 'token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }

    public function testCreate()
    {
        $response = $this->json('POST', '/api/clients', ['email' => '12345@12345.12345', 'name' => 'namenamename123', 'phone' => '89438273281', 'token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }

    public function testShow()
    {
        $response = $this->json('GET', '/api/clients/1', ['token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }

    public function testUpdate()
    {
        $response = $this->json('POST', '/api/clients/2', ['phone' => '13372281488', 'token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }

    public function testDestroy()
    {
        $response = $this->json('DELETE', '/api/clients/3', ['token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }
}
