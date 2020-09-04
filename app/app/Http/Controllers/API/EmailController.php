<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmailResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class EmailController extends Controller
{
    public function create() {

        /*
        $data = array('name'=>"Virat Gandhi");
        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
        */


        /*
        $toEmail = "newmanforlife@list.ru";
        Mail::to($toEmail)->send(new Email());
        return Response::ok();
        */
    }

    public function show(){
        $emails = auth::user()->emails;
        return Response::ok(["data" => EmailResource::collection($emails)]);
    }
}
