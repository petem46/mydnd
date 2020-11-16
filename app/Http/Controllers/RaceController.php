<?php

namespace App\Http\Controllers;

use App\Race;
use App\Http\Resources\RaceResource;
use App\Http\Resources\RacesResource;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RacesResource(Race::get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $race
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        RaceResource::withoutWrapping();

        return new RaceResource($race);
    }
}
