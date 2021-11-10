<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\RoomFacilities;
use App\Models\Media;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
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
        $data = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->orderBy('reservations.check_in','desc')
        ->get();

        return view('admin.payment', compact('data'));
    }

    public function payEdit($id, $in, $out, $price, $book, $room){
        $user = Auth::user()->id;
        $o = Carbon::parse($out)->format('Ymd');
        $i = Carbon::parse($in)->format('Ymd');
        $nights = $o-$i;
        $ppn = $price*0.1;
        $svc = $price*0.1;
        $subtotal = $price*$nights;
        $total = $subtotal+$ppn+$svc;
        $downpayment = $total*0.5;

        $banner = Reservation::join('rooms','reservations.room_id','=','rooms.id')
        ->where('reservations.id',$id)
        ->pluck('rooms.banner');

        $facilities = RoomFacilities::join('facilities','room_facilities.facilities_id','=','facilities.id')
        ->join('rooms','room_facilities.room_id','=','rooms.id')
        ->where('room_facilities.room_id',$id)
        ->get();

        $getRoomId = Reservation::join('rooms','reservations.room_id','=','rooms.id')
        ->where('reservations.id',$id)
        ->pluck('rooms.id');

        $media = Media::join('rooms','media.room_id','=','rooms.id')
        ->where('media.room_id',$getRoomId[0])
        ->get();

        return view('payedit', compact('facilities','id','user','book','room','banner','in','out','price','nights','total','media','downpayment'));
    }

    public function payment(Request $req){
        if ($req->select_payment == "dp") {
            $proof = $req->file('proof');

            $file_name = time()."_".$proof->getClientOriginalName();
        
            $dir_proof = 'photos/proof';

            $proof->move($dir_proof,$file_name);

            $payment = new Payment;
            $payment->user_id = $req->user_id;
            $payment->reservation_id = $req->reservation_id;
            $payment->invoice = $req->book_code;
            $payment->payment_type = "Bank Transfer";
            $payment->amount = $req->total;
            $payment->remaining_amount = $req->downpayment;
            $payment->payment_status = "paid half";
            $payment->proof = $file_name;
            $payment->save();
            alert()->success('Payment Success',Auth::user()->name.' we are waiting for you');
            return redirect()->route('dashboard');

        } else if($req->select_payment == "fp"){
            $proof = $req->file('proof');

            $file_name = time()."_".$proof->getClientOriginalName();
        
            $dir_proof = 'photos/proof';

            $proof->move($dir_proof,$file_name);
            $payment = new Payment;
            $payment->user_id = $req->user_id;
            $payment->reservation_id = $req->reservation_id;
            $payment->invoice = $req->book_code;
            $payment->payment_type = "Bank Transfer";
            $payment->amount = $req->total;
            $payment->remaining_amount = 0;
            $payment->payment_status = "paid";
            $payment->proof = $file_name;
            $payment->save();
            alert()->success('Payment Success',Auth::user()->name.' we are waiting for you');
            return redirect()->route('dashboard');
        } else {
            alert()->warning('Select payment','Please select payment information');
            return redirect()->back()->withInput();
        }
        
        return redirect()->route('pay.confirm');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    public function bayar($id){
        $data = DB::table('payments')
        ->join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payments.id',$id)
        ->get();
    
        return view('admin.edit.payment_edit', compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
