<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class AlreadyHaveEmailTodayException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return Response::exception(7, 403, $this);
    }
}
