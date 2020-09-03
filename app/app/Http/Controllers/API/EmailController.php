<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use Illuminate\Support\Facades\Response;

class EmailController extends Controller
{
    public function create() {
        $toEmail = "newmanforlife@list.ru";
        Mail::to($toEmail)->send(new Email());
        return Response::ok();
    }
}
