<?php

namespace App\Http\Resources\Email;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;

class EmailResource extends JsonResource
{
    /** @var Paginator */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => EmailDataResource::collection($this->resource),
            "meta" => new EmailMetaResource($this->resource),
            "options" => new EmailOptionsResource($this->resource)
        ];
    }
}
