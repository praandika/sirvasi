<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $dayNow = Carbon::now('GMT+8')->format('d');
        $monthNow = Carbon::now('GMT+8')->format('m');
        $yearNow = Carbon::now('GMT+8')->format('Y');

        if (Auth::user()->access == "user") {
            $data = Reservation::join('users','reservations.user_id','=','users.id')
            ->join('rooms','reservations.room_id','=','rooms.id')
            ->where('email',Auth::user()->email)
            ->select('reservations.*','book_code','check_in','check_out','rooms.room_name','rooms.room_price')
            ->get();

            $now = Carbon::now('GMT+8')->format('Y-m-d H:i');

            $sum_unpaid = Payment::where([
                ['user_id', Auth::user()->id],
                ['payment_status','unpaid']
            ])->sum('remaining_amount');
            
            $sum_half = Payment::where([
                ['user_id', Auth::user()->id],
                ['payment_status','paid half']
            ])->sum('remaining_amount');

            $room_future = Reservation::join('users','reservations.user_id','=','users.id')
            ->join('rooms','reservations.room_id','rooms.id')
            ->where([
                ['user_id',Auth::user()->id],
                ['reservation_status','=','waiting'],
            ])
            ->select('rooms.room_name','reservation_status')
            ->get();

            $current_room = Reservation::join('users','reservations.user_id','=','users.id')
            ->join('rooms','reservations.room_id','rooms.id')
            ->where([
                ['user_id',Auth::user()->id],
                ['reservation_status','=','arrived'],
            ])
            ->select('rooms.room_name','reservation_status')
            ->get();

            // dd($current_room);

            return view('admin.dashboard', compact('data','sum_unpaid','sum_half','room_future','current_room'));
        }else{
            $countNewBook = Reservation::where('validation','wait')
            ->whereYear('check_in',$yearNow)
            ->count();

            $countBooked = Reservation::where('validation','yes')
            ->whereYear('check_in',$yearNow)
            ->count();

            $countGuest = Reservation::where('reservation_status','arrived')
            ->whereMonth('check_in',$monthNow)
            ->count();

            $countCancel = Reservation::where('reservation_status','cancel')
            ->whereMonth('check_in',$monthNow)
            ->count();

            $sum_paid = Payment::join('reservations','payments.reservation_id','=','reservations.id')
            ->where('payment_status','paid')
            ->whereMonth('reservations.check_in',$monthNow)
            ->sum('amount');

            $sum_half = Payment::join('reservations','payments.reservation_id','=','reservations.id')
            ->where('payment_status','paid half')
            ->whereMonth('reservations.check_in',$monthNow)
            ->sum('remaining_amount');

            $sum_unpaid = Payment::join('reservations','payments.reservation_id','=','reservations.id')
            ->where('payment_status','unpaid')
            ->whereMonth('reservations.check_in',$monthNow)
            ->sum('amount');

            $yearLast = $yearNow-1;

            return view('admin.dashboard', compact('countNewBook','countBooked','countGuest','countCancel','sum_paid','sum_half','sum_unpaid','yearNow','yearLast'));
        }
    }

    public function historyBook(){
        $data = Reservation::join('users','reservations.user_id','=','users.id')
        ->join('rooms','reservations.room_id','=','rooms.id')
        ->where('users.id', Auth::user()->id)
        ->orderBy('check_in','desc')
        ->get();

        return view('admin.history_book', compact('data'));
    }

    public function historyPay(){
        $data = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('users.id', Auth::user()->id)
        ->get();

        return view('admin.history_pay', compact('data'));
    }
}
