<?php

namespace App\Http\Resources\Email;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Repositories\UserRepository;
use App\User;

class EmailOptionsResource extends JsonResource
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var User
     */
    public $resource;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->repository = app()->make(UserRepository::class);
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
            "rest" => $this->repository->restOfEmails($this->resource),
        ];
    }
}
