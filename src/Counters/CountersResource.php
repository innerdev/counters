<?php

namespace App\Counters;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CountersResource extends JsonResource
{
    public static $wrap = "data";
    public function toArray($request): array
    {
        return [
            'value' => $this->getV1alue(),
            'total' => $this->getTotal(),
            'isFavourite' => $this->isFavourite()
        ];
    }
}