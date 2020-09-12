<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class ForbiddenException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return Response::exception(8, 403, $this);
    }
}
