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
            ]);
    }

    public function testLogout()
    {
        $token = Auth::tokenById(1);
        $response = $this->postJson('/api/auth/logout', ['token' => $token]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }

    /*
    public function testMe()
    {
        $token = Auth::tokenById(1);
        $response = $this->postJson('/api/auth/me', ['token' => $token]);
        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }
    */
}
