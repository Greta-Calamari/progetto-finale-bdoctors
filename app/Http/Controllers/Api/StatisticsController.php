<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class StatisticsController extends Controller
{
    public function statMessages(Request $request){
        // $currentUser = Auth::user();
        // dd(Auth::user()->id);
        // $user_id = $currentUser->id;
        // $user_id = $request->query('id');
        // $messages = Message::where('doctor_id', $user_id)->get();

        // select(DB::raw("(COUNT(*)) as total_click"))
    
        //     ->orderBy('created_at')
    
        //     ->groupBy(DB::raw("MONTH(created_at)"))
    
        //     ->get();
        // $messages =  $messages->groupBy(function($item) {
        //     //return $item->date->format('Y-m');
        //     return Carbon::parse($item->created_at)->format('m/d/Y h:m');

        // });
        // return response()->json($messages);
    }
}
