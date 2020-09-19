<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ClientTest extends TestCase
{

    /*public function testIndex()
    {
        $response = $this->getJson('/api/clients', ['limit' => '10', 'page' => '1', 'token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }*/


    public function testCreate()
    {
        $response = $this->postJson('/api/clients', ['email' => '12345@12345.12345', 'name' => 'namenamename123', 'phone' => '89438273281', 'token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }
}
