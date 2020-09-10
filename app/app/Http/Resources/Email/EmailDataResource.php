<?php

namespace App\Http\Resources\Email;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class EmailDataResource extends JsonResource
{
    public $resource;
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
            "created_at"=> Carbon::createFromFormat('Y-m-d H:i:s', $this->resource->created_at)->format('d-m-Y H:i:s'),
        ];
    }
}
