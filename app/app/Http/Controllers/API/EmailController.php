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
        // Достаём последнее письмо челикса
        $email = auth::user()->emails->last();

        // Если чё то достали
        if($email != NULL){

            //Если письму меньше часа
            if (!$email->created_at->lt(Carbon::now()->subMinutes(1))){

                // Возвращаем код ошибки 5051
                return Response::ok(["data" => "5051"]);
            }

        }

        // Если всё нормально, нашли письмо и оно пожилое, тогда берём и отправляем его
        Mail::to($request->to)->send(new FeedbackMail($request->body));

        // А потом сохраняем в базе
        $email = Email::create([
            'user_id' => auth()->user()->id,
            'to' => $request->to,
            'body' => $request->body,
        ]);

        // Возвращаем Ок, и прикладываем получившиеся письмо
        return Response::ok(["data" => new EmailResource($email)]);
    }

    public function index(){
        $emails = auth::user()->emails;
        return Response::ok(["data" => EmailResource::collection($emails)]);
    }
}
