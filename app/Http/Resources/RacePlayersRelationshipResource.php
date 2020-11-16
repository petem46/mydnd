<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RacePlayersRelationshipResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $race = $this->additional['race'];

        return [
            // 'data' => PlayerIdentifierResource::collection($this->collection),
            'data' => $race,
        ];

        // return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'links' => [
                'self' => route('races.index'),
            ],
        ];
    }
}
