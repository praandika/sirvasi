<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Room::all();
        return view('landing', compact('data'));
    }

    public function search(Request $req){
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
        
        return view('search', compact('data','rekomendasi','check_in','check_out'));
    }

    public function detailbook(Request $req){
        $check_in = $req->check_in;
        $check_out = $req->check_out;

        $user = User::where('email',Auth::user()->email)->get();

        return view('detail', compact('data','check_in','check_out','user'));
    }
}
