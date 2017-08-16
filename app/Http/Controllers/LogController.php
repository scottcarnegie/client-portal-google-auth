<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ClientSessionLog;
use App\Client;
use App\Trainer;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function createLog(Request $request)
    {
        if(isset($request["logData"])){
            
            $client = Client::where('id',$request["id"])->first();
            $trainer = Trainer::where('id',$client->trainer->id)->first();

            $log = new ClientSessionLog();
            $log->details = $request->logData;

            $client->hasClientSessionLogs()->save($log);
            $trainer->hasClientSessionLogs()->save($log);

        }   

        return response()->json([
            'id' => $log->id,
            'details' => $log->details,
            'trainer' => $log->trainer->first_name.' '.$log->trainer->last_name,
            'client' => $log->client->first_name.' '.$log->client->last_name
        ]);

    }
}