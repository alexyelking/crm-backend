<?php

namespace App\Http\Controllers\API;

use App\Email;
use App\Http\Controllers\Controller;
use App\Http\Requests\Email\CreateRequest;
use App\Http\Resources\EmailResource;
use App\Mail\FeedbackMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class EmailController extends Controller
{
    public function create(CreateRequest $request) {
        Mail::to($request->to)->send(new FeedbackMail($request->body));

        $email = Email::create([
            'user_id' => auth()->user()->id,
            'to' => $request->to,
            'body' => $request->body,
        ]);

        return Response::ok(["data" => new EmailResource($email)]);
    }



    public function index(){
        $emails = auth::user()->emails;
        return Response::ok(["data" => EmailResource::collection($emails)]);
    }
}
