<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Response;
use Exception;

class AlreadyHaveEmailTodayException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return Response::custom(7, 403, $this);
    }
}
