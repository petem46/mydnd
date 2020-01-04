<?php

namespace App\Http\Controllers\Api;

use App\PC;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PCResource;

class PCsController extends Controller
{
    public function index()
    {
        $pcs = PC::with('Race')->paginate(6);

        return PCResource::collection($pcs);
    }

    public function show(PC $pc)
    {
        return new PCResource($pc);
    }

    public function update(Request $request, $id)
    {
        $pc = PC::findOrFail($id);
        $pc->str = $request->str;
        $pc->save();
        return PCResource::collection($pc);
    }
}
