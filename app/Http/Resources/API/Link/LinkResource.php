<?php

namespace App\Http\Resources\API\Link;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'url' => route('shortlink', ['base' => base_convert($this->id, 10, 36)])
        ];
    }
}
