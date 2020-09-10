<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarsResource extends JsonResource
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
            [
                $a1=mt_rand(5, 15),
                $a2=mt_rand(5, 15),
                $a3=mt_rand(5, 15),
                $a4=mt_rand(5, 15),
                $a5=mt_rand(5, 15),
                $a6=mt_rand(5, 15),
                $a7=mt_rand(5, 15),
            ],
            [
                $b1=mt_rand(20, 50),
                $b2=mt_rand(20, 50),
                $b3=mt_rand(20, 50),
                $b4=mt_rand(20, 50),
                $b5=mt_rand(20, 50),
                $b6=mt_rand(20, 50),
                $b7=mt_rand(20, 50),
            ],
        ];
    }
}
