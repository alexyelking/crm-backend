<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Email\EmailDataResource;
use App\Http\Resources\Email\EmailMetaResource;
use App\Http\Requests\Email\CreateRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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

        return Response::ok(["email" => new EmailDataResource($email)]);
    }

    public function index(Request $request)
    {
        $emails = auth::user()->emails()->paginate($request->limit);
        return Response::ok(["data" => EmailDataResource::collection($emails), "meta" => new EmailMetaResource($emails)]);
    }
}