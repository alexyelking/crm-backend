<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "info" => mt_rand(1, 10)/10,
            "success" => mt_rand(70, 95)/100,
            "warning" => mt_rand(3, 8)/10,
            "danger" => mt_rand(10, 35)/100,
        ];
    }
}
