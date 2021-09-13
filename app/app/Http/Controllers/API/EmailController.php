<?php

namespace App\Http\Controllers\API;

use App\Email;
use App\Http\Controllers\Controller;
use App\Http\Requests\Email\CreateRequest;
use App\Http\Resources\Email\EmailDataResource;
use App\Http\Resources\Email\EmailMetaResource;
use App\Mail\FeedbackMail;
use App\Repositories\EmailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;


class EmailController extends Controller
{
    /**
     * @var EmailRepository
     */
    private $repository;

    public function __construct(EmailRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $emails = $this->repository->paginateByUser(Auth::user(), $request->limit);
        $rest = $this->repository->restByUser(Auth::user());
        return Response::ok(["data" => EmailDataResource::collection($emails), "meta" => new EmailMetaResource($emails), "options" => ["rest" => $rest]]);
    }

    /**
     * @param CreateRequest $request
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        $email = $this->repository->storeByUser(Auth::user(),
            [
                'to' => $request->to,
                'body' => $request->body,
            ]);

        Mail::to($request->to)->send(new FeedbackMail($request->body, auth::user(), $request->header('Locale')));

        return Response::ok(["email" => new EmailDataResource($email)]);
    }

    /**
     * @param Email $email
     * @return mixed
     */
    public function show(Email $email)
    {
        return Response::ok(["email" => new EmailDataResource($email)]);
    }
}
