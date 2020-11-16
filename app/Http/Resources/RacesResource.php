<?php

namespace App\Http\Resources;

use App\PC;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RacesResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => RaceResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        return [
            'links'    => [
                'self' => route('races.index'),
            ],
        ];
    }
}
