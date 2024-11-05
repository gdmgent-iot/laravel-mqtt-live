<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Heartbeat;

class HeartBeatController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());

        $record = new Heartbeat();
        $record->name = $request->name;
        $record->email = $request->email;
        $record->heartbeats = $request->heartbeats;
        $record->save();
    }
}
