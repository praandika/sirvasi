<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->access == "user") {
            $data = Reservation::join('users','reservations.user_id','=','users.id')
            ->join('rooms','reservations.room_id','=','rooms.id')
            ->where('email',Auth::user()->email)
            ->select('reservations.*','book_code','check_in','check_out','rooms.room_name')
            ->get();
            return view('admin.dashboard', compact('data'));
        }else{
            $countNewBook = Reservation::where('validation','wait')->count();
            return view('admin.dashboard', compact('countNewBook'));
        }
        
        
    }
}
