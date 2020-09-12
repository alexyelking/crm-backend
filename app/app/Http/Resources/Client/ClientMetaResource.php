<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientMetaResource extends JsonResource
{
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
            "rows" => [
                "from" => $this->resource->firstItem(),
                "to" => $this->resource->lastItem(),
                "total" => $this->resource->total(),
            ],
            "navigation" => [
                "page" => $this->resource->currentPage(),
                "page_last" => $this->resource->lastPage(),
                "limit" => $this->resource->perPage(),
            ],
        ];
    }
}
