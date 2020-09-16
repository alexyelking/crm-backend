<?php

namespace App\Http\Controllers\API;

use App\Email;
use App\Http\Controllers\Controller;
use App\Http\Requests\Email\CreateRequest;
use App\Http\Resources\Email\EmailDataResource;
use App\Http\Resources\Email\EmailMetaResource;
use App\Http\Resources\Email\EmailOptionsResource;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;


class EmailController extends Controller
{
    public function index(Request $request)
    {
        $emails = auth::user()->emails()->paginate($request->limit);
        return Response::ok(["data" => EmailDataResource::collection($emails), "meta" => new EmailMetaResource($emails), "options" => new EmailOptionsResource($emails)]);
    }

    public function show(Email $email)
    {
        return Response::ok(["client" => new EmailDataResource($email)]);
    }

    public function create(CreateRequest $request)
    {
        $email = Auth::user()->emails()->create([
            'to' => $request->to,
            'body' => $request->body,
        ]);

        Mail::to($request->to)->send(new FeedbackMail($request->body, auth::user(), $request->header('Locale')));

        return Response::ok(["email" => new EmailDataResource($email)]);
    }
}