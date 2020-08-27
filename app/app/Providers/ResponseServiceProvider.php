<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro("ok", function ($data = [], $message = "") {
            return Response::custom(0, 200, $data, $message);
        });

        Response::macro("exception", function ($status, $code,\Throwable $e, $errors = []) {
            // Для прода
            $err = empty($errors) ? [] : $errors;
            $data = [];

            // Для локали и дева
            if(app()->environment(["local","development"])){
                $err = empty($errors) ? $e->getTraceAsString() : $errors;
                $data = ["classname" => class_basename($e)];
            }

            return Response::custom($status, $code, $data, $e->getMessage(), $err);
        });


        Response::macro("custom",
            function ($status = 0, $code = 200, $data = [], $message = "", $errors = []) {

                $resp = [
                    "status" => $status, // 0 - Все хорошо, 1 - Что то не так
                    "code" => $code, // статус header
                    "data" => Arr::wrap($data), // основное тело ответа. Данные, который мы запросили
                    "message" => $message, // Сообщение из ошибки
                    "errors" => Arr::wrap($errors), // сумка с ошибками или стактрейс
                ];

                return \response()->json($resp)->setStatusCode($code);
            });
    }
}
