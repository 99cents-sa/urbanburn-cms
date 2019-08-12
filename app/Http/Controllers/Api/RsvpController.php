<?php

namespace App\Http\Controllers\Api;
use App\Rsvp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RsvpController extends Controller
{
    public function index()
    {
        
        $rsvps = Rsvp::all();
        return response()->json($rsvps, 200);
    }

    public function show($email)
    {
        //$guest = DB::table('rsvps')->where('email',$email)->first();
        //return response()->json($guest, 200);
        $guest = DB::table('rsvps')->where('email',$email)->first();
        if ($guest === null) {
            return response()->json(['error' => 'Sorry you"re not on the guest list'], 401);
        } else {
            return response()->json(['success' => $guest], 200);
        }
    }

    public function attending($email) {
        //$guest = DB::table('rsvps')->where('email',$email)->first();
        $guest = Rsvp::where('email', $email)->first();
        $guest->attending = 1; 
        $guest->save();
        
       

        return response()->json(['success' => 'See you at the Party'], 200);
    }
    
}
