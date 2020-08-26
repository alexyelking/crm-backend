<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Validation
        if ($exception instanceof ValidationException) {
            return Response::exception(1, 422, $exception, $exception->errors());
        }

        // HttpExceptions from laravel
        if ($exception instanceof HttpException) {
            return Response::exception(2, $exception->getStatusCode(), $exception);
        }

        // NotFound
        if (preg_match("~NotFound~", class_basename($exception))) {
            return Response::exception(3, 404, $exception);
        }


        // Unauthorized
        if ($exception instanceof AuthenticationException) {
            return Response::exception(4, 401, $exception);
        }

        // Forbidden
        if ($exception instanceof UnauthorizedException) {
            return Response::exception(5, 403, $exception);
        }

        // Default Exception
        return Response::exception(6, 500, $exception);
    }
}
