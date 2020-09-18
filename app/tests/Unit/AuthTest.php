<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testRegister()
    {
        $response = $this
            ->postJson('/api/auth/register', [
                'name' => 'itsNameExample',
                'email' => 'its@email.example',
                'password' => 'itsPasswordExample',
                'password_confirmation' => 'itsPasswordExample',
            ]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }

    public function testLogin()
    {
        $response = $this->postJson('/api/auth/login', ['email' => '123@123.123', 'password' => '123123']);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
                'data' => ['user' => ['email' => '123@123.123']]
            ]);
    }

    /*public function testMe()
    {
        $response = $this->getJson('/api/auth/me', ['token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }*/

    public function testLogout()
    {
        $response = $this->postJson('/api/auth/logout', ['token' => Auth::tokenById(1)]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }
}
