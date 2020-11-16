<?php

namespace App\Http\Resources;

use App\PC;
use Illuminate\Http\Resources\Json\Resource;

class RacesRelationshipResource extends Resource
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
                // 'player'    =>  [
                //     'links' => [
                //         'self'      =>  route('races.relationships.player', ['race' => $this->id]),
                //         'related'   =>  route('races.player', ['article' => $this->id]),
                //     ],
                //     'data'  =>  new PlayerIdentifierResource($this->player),
                // ],
                'players' => PC::where('race_id', $this->id)->get(),
            ];
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
