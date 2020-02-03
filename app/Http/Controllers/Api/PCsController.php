<?php

namespace App\Http\Controllers\Api;


use App\PC;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PCResource;
use App\Events\PlayerUpdated;

class PCsController extends Controller
{
    public function index()
    {
        $pcs = PC::with('Race')->orderby('livehp', 'desc')->paginate(6);

        return PCResource::collection($pcs);
    }

    public function show(PC $pc)
    {
        return new PCResource($pc);
    }

    public function update(Request $request, $id)
    {
        $pc = PC::findOrFail($id);
        $pc->name = $request->name;
        // $pc->race = $request->race;
        $pc->gender = $request->gender;
        $pc->str = $request->str;
        $pc->dex = $request->dex;
        $pc->con = $request->con;
        $pc->int = $request->int;
        $pc->wis = $request->wis;
        $pc->cha = $request->cha;
        $pc->livehp = $request->livehp;
        $pc->hp = $request->hp;
        $pc->ac = $request->ac;
        $pc->save();

        event(new PlayerUpdated($pc));

        return response(null, Response::HTTP_OK);
    }
}
