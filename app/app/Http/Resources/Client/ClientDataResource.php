<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ClientDataResource extends JsonResource
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
            "name" => $this->resource->name,
            "email" => $this->resource->email,
            "phone" => $this->resource->phone,
            "created_at"=> Carbon::createFromFormat('Y-m-d H:i:s', $this->resource->created_at)->format('d-m-Y H:i:s'),
        ];
    }
}
