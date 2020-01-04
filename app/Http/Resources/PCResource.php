<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PCResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'race' => $this->race['name'],
            'class_id' => $this->class_id,
            'str' => $this->str,
            'dex' => $this->dex,
            'con' => $this->con,
            'int' => $this->int,
            'wis' => $this->wis,
            'cha' => $this->cha,
            'hp' => $this->hp,
            'ac' => $this->ac,
            'speed' => $this->speed,
            'lvehp' => $this->lvehp,

        ];
    }
}
