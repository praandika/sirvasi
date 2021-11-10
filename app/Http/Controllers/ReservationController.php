<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\RoomFacilities;
use App\Models\Payment;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

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
        $now = Carbon::now('GMT+8')->format('YmdHis');
        $book_code = "Book".$now."";
        
        return view('admin.book',compact('user','room','book_code'));
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
        $user = new User;
        $reservation = New Reservation;
        $payment = new Payment;

        // Hitung Sisa bayar
        $amount = $req->room_price;
        $pay = $req->pay;
        $remaining_amount = $amount - $pay;

        // Menentukan payment status
        if ($remaining_amount == $amount) {
            $payment_status = "unpaid";
        } elseif ($remaining_amount == 0) {
            $payment_status = "paid";
        } elseif ($remaining_amount < 0) {
            $payment_status = "paid";
        } else {
            $payment_status = "paid half";
        }

        $cekUser = User::where('email',$req->email)->first();

        if ($cekUser) {
            $reservation->book_code = $req->book_code;
            $reservation->room_id = $req->room_id;
            $reservation->user_id = $req->user_id;
            $reservation->check_in = $req->check_in;
            $reservation->check_out = $req->check_out;
            $reservation->guest_count = $req->guest_count;
            $reservation->note = $req->note;
            $reservation->validation = "wait";
            $reservation->save();

            $getReservation = Reservation::where('book_code',$req->book_code)->first('id');
            
            $payment->user_id = $req->user_id;
            $payment->reservation_id = $getReservation->id;
            $payment->invoice = $req->book_code;
            $payment->payment_type = $req->payment_type;
            $payment->amount = $req->room_price;
            $payment->remaining_amount = $remaining_amount;
            $payment->payment_status = $payment_status;
            $payment->save();

            toast('Reservasi sukses','success');
            return redirect()->route('reservation.index');
        } else {
            // Buat Username baru
            $user->name = $req->name;
            $user->email = $req->email;
            $user->phone = $req->phone;
            $user->password = bcrypt($req->email);
            $user->save();
            
            $getUser = User::where('email',$req->email)->first('id');

            $reservation->book_code = $req->book_code;
            $reservation->room_id = $req->room_id;
            $reservation->user_id = $getUser->id;
            $reservation->check_in = $req->check_in;
            $reservation->check_out = $req->check_out;
            $reservation->guest_count = $req->guest_count;
            $reservation->note = $req->note;
            $reservation->validation = "wait";
            $reservation->save();

            $getReservation = Reservation::where('book_code',$req->book_code)->first('id');

            $payment->user_id = $getUser->id;
            $payment->reservation_id = $getReservation->id;
            $payment->invoice = $req->book_code;
            $payment->payment_type = $req->payment_type;
            $payment->amount = $req->room_price;
            $payment->remaining_amount = $remaining_amount;
            $payment->payment_status = $payment_status;
            $payment->save();

            toast('Reservasi sukses','success');
            return redirect()->route('reservation.index');;
        }
    }

    public function detailbook($id, $in, $out, $price, $room, $person){

        $ppn = $price*0.1;
        $svc = $price*0.1;
        $total = $price+$ppn+$svc;

        $data = Room::find($id);
        $facilities = RoomFacilities::join('facilities','room_facilities.facilities_id','=','facilities.id')
        ->join('rooms','room_facilities.room_id','=','rooms.id')
        ->where('room_facilities.room_id',$id)
        ->get();

        return view('detail', compact('in','out','id','price','room','total','data','facilities','person'));
    }

    public function pay(Request $req){
        $now = Carbon::now('GMT+8')->format('YmdHis');
        $book_code = "Book".$now."";

        User::where('email',Auth::user()->email)
        ->update([
            'phone' => $req->phone,
            'address' => $req->address,
        ]);

        $reservation = New Reservation;
        $reservation->book_code = $book_code;
        $reservation->room_id = $req->id;
        $reservation->user_id = Auth::user()->id;
        $reservation->check_in = $req->in;
        $reservation->check_out = $req->out;
        $reservation->guest_count = $req->person;
        $reservation->note = $req->note;
        $reservation->validation = "wait";
        $reservation->save();

        alert()->success('Welcome',Auth::user()->name);
        return redirect()->route('dashboard');
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
