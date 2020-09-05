<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Response;
use Exception;

class ValidationException extends Exception
{
    private $bag;

    /**
     * ValidationException constructor.
     * @param $bag
     */
    public function __construct($bag = [])
    {
        $this->bag = $bag;
    }


    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return Response::custom(1, 422, [], "", $this->bag);
    }
}
