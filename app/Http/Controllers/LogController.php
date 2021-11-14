<?php

namespace App\Http\Controllers;



use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;


class LogController extends Controller
{
    public function FindLogs(Request $request){
        $request->validate([
            'user_id'=> ['max:100','min:0'],
            'action'=> ['max:100','min:0'],
            'item_type'=> ['max:100','min:0']
        ]);
        if(is_null($request->user_id) == false || is_null($request->action) == false || is_null($request->item_type) == false){
        $logs=Log::select();
        if(is_null($request->user_id) == false){
            $logs = $logs->where('user_id', $request->user_id);
        }
        if(is_null($request->action) == false){
            $logs = $logs->where('action', $request->action);
        }
        if(is_null($request->item_type) == false){
            $logs = $logs->where('item_type', $request->item_type);
        }
        $logs= $logs->get();
        }
        else $logs = Log::all();
        return view('logs',compact('logs'));
    }
}
