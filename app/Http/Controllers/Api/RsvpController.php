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
        $guest = DB::table('rsvps')->where('email',$email)->first();
        return response()->json($guest, 200);
    }
}
