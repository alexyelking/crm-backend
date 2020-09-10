<?php

namespace App\Http\Resources\Email;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailMetaResource extends JsonResource
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
            "rows" => [
                "from"=>$this->resource->firstItem(),
                "to"=>$this->resource->lastItem(),
                "total"=>$this->resource->total(),
            ],
            "navigation" => [
                "page"=>$this->resource->currentPage(),
                "page_last"=>$this->resource->lastPage(),
                "limit"=>$this->resource->perPage(),
            ],
        ];
    }
}
