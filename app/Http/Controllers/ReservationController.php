<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Payment;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reservation::orderBy('check_in', 'desc')->get();
        $detail = Reservation::join('users','reservations.user_id','=','users.id')
        ->select('reservations.*','users.name','users.phone','users.country','users.email','users.address')
        ->get();

        return view('admin.reservation', compact('data','detail'));
    }

    public function book(){
        $user = User::where('access','user')->get();
        $room = Room::where('room_status','available')->get();
        
        return view('admin.book',compact('user','room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $now = Carbon::now('GMT+8')->format('YmdHis');
        $generateBook = "Book".$now."";
        $user = new User;
        $reservation = New Reservation;
        $payment = new Payment;

        $cekUser = User::where('email',$req->email)->first();

        if ($cekUser) {

            $reservation->book_code = $generateBook;
            $reservation->room_id = $req->room_id;
            $reservation->user_id = $cekUser;
            $reservation->check_in = $req->check_in;
            $reservation->check_out = $req->check_out;
            $reservation->guest_count = $req->guest_count;
            $reservation->note = $req->note;
            $reservation->save();

            $getReservation = Reservation::where('book_code',$generateBook)->pluck('id');

            $payment->user_id = $cekUser;
            $payment->reservation_id = $getReservation;
            $payment->invoice = $generateBook;
            $payment->type = $req->payment_type;
            $payment->amount = $req->amount;
            $payment->remaining = $req->remaining_amount;
            $payment->status = $req->payment_status;
            $payment->save();

            toast('Reservasi sukses','success');
            return redirect()->back();
        } else {
            $user->name = $req->name;
            $user->email = $req->email;
            $user->phone = $req->phone;
            $user->save();
        }
        
        $getUser = User::where('email',$req->email)->pluck('id');

        $reservation->book_code = $generateBook;
        $reservation->room_id = $req->room_id;
        $reservation->user_id = $getUser;
        $reservation->check_in = $req->check_in;
        $reservation->check_out = $req->check_out;
        $reservation->guest_count = $req->guest_count;
        $reservation->note = $req->note;
        $reservation->save();

        $getReservation = Reservation::where('book_code',$generateBook)->pluck('id');

        $payment->user_id = $getUser;
        $payment->reservation_id = $getReservation;
        $payment->invoice = $generateBook;
        $payment->type = $req->payment_type;
        $payment->amount = $req->amount;
        $payment->remaining = $req->remaining_amount;
        $payment->status = $req->payment_status;
        $payment->save();

        toast('Reservasi sukses','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
