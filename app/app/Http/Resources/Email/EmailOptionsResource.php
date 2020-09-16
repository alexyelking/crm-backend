<?php

namespace App\Http\Resources\Email;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class EmailOptionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $rest = 1;
        $email = auth::user()->emails->last();
        if ($email != NULL) {
            if (!$email->created_at->lt(Carbon::now()->subMinutes(5))) {
                $rest = 0;
            }
        }
        return [
            "rest" => $rest,
        ];
    }
}
