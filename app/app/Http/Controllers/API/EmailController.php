<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Email\CreateRequest;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\EmailResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;


class EmailController extends Controller
{
    public function create(CreateRequest $request)
    {
        $email = Auth::user()->emails()->create([
            'to' => $request->to,
            'body' => $request->body,
        ]);

        Mail::to($request->to)->send(new FeedbackMail($request->body, auth::user(), $request->header('Locale')));

        return Response::ok(["data" => new EmailResource($email)]);
    }

    public function index()
    {
        $emails = auth::user()->emails;
        return Response::ok(["data" => EmailResource::collection($emails)]);
    }
}