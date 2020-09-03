<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Response;

class MailController extends Controller
{
    public function create() {
        $toEmail = "newmanforlife@list.ru";
        Mail::to($toEmail)->send(new FeedbackMail());
        return Response::ok();
    }
}
