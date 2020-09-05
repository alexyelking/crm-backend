<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
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
            "id" => $this->resource->id,
            "from" => $this->resource->user_id,
            "to"=> $this->resource->to,
            "body"=> $this->resource->body,
            "created_at"=> $this->resource->created_at,
        ];
    }
}
