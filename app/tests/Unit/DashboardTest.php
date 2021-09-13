<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->json('GET', '/api/dashboard', ['token' => Auth::tokenById(1)]);

        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }
}
