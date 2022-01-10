<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\RoomFacilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index(){
        $data = DB::table('rooms')->get();
        return view('landing', compact('data'));
    }

    public function searchroom(Request $req){
        $data = Room::where([
            ['room_capacity',$req->person],
            ['room_status','available'],
        ])
        ->get();

        if ($req->person >= 2) {
            $rekomendasi = Room::orderBy('room_capacity','desc')->get();
        } else {
            $rekomendasi = Room::orderBy('room_capacity','asc')->get();
        }

        $check_in = $req->check_in;
        $check_out = $req->check_out;
        $person = $req->person;
        
        return view('search', compact('data','rekomendasi','check_in','check_out','person'));
    }
}
