<?php

namespace App\Http\Resources\Email;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;

class EmailsResource extends JsonResource
{
    /** @var Paginator */
    public $resource;

    /**
     * @var int
     */
    private $rest;

    public function __construct($resource, int $rest)
    {
        parent::__construct($resource);

        $this->rest = $rest;
    }

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
            "options" => ["rest" => $this->rest],
        ];
    }
}
