<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class EmailTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->json('GET', '/api/emails', ['token' => Auth::tokenById(1)]);

        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }

    // Сложно проверить, так как выдаёт ошибку 7 403, потому что сидер генерит письма всем людям и сразу же пытается отправить ещё одно
//    public function testCreate()
//    {
//        $response = $this->json('POST', '/api/emails', ['to' => 'newmanforlife@list.ru', 'body' => 'its a emails body', 'token' => Auth::tokenById(1)]);
//
//        $response
//            ->assertJson([
//                'status' => 0,
//                'code' => 200,
//            ]);
//    }

    public function testShow()
    {
        $response = $this->json('GET', '/api/emails/1', ['token' => Auth::tokenById(1)]);

        $response
            ->assertJson([
                'status' => 0,
                'code' => 200,
            ]);
    }
}
