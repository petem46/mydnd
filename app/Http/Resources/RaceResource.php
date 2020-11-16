<?php

namespace App\Http\Resources;

use App\PC;
use Illuminate\Http\Resources\Json\Resource;

class RaceResource extends Resource
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
            'type'          =>  'races',
            'id'            =>  (string) $this->id,
            'attributes'    => [
                'race' => $this->name,
            ],
            'players' => PC::where('race_id', $this->id)->get(),
            'links'         => [
                'self' => route('races.show', ['race' => $this->id]),
            ],
        ];
    }
}
