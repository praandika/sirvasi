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
use PDF;

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
        ->select('payments.*','users.name','users.phone','users.address','reservations.check_in','reservations.check_out')
        ->orderBy('created_at','desc')
        ->get();

        return view('admin.payment', compact('data'));
    }

    public function payEdit($id, $in, $out, $price, $book, $room){
        $user = Auth::user()->id;
        $o = Carbon::parse($out)->format('Ymd');
        $i = Carbon::parse($in)->format('Ymd');
        $nights = $o-$i;
        $subtotal = $price*$nights;
        $ppn = $subtotal*0.1;
        $svc = $subtotal*0.1;
        $total = $subtotal+$ppn+$svc;
        $downpayment = $total*0.5;

        $banner = Reservation::join('rooms','reservations.room_id','=','rooms.id')
        ->where('reservations.id',$id)
        ->pluck('rooms.banner');

        $getRoomId = Reservation::join('rooms','reservations.room_id','=','rooms.id')
        ->where('reservations.id',$id)
        ->pluck('rooms.id');

        $facilities = RoomFacilities::join('facilities','room_facilities.facilities_id','=','facilities.id')
        ->join('rooms','room_facilities.room_id','=','rooms.id')
        ->where('room_facilities.room_id',$getRoomId)
        ->get();

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

            $invoice = $req->book_code;

            return redirect('result/'.$invoice);

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

            $invoice = $req->book_code;

            return redirect('result/'.$invoice);
        } else if($req->select_payment == "select") {
            return redirect()->back()->withFail('*Please select payment information');
        }
    }

    public function invoice($invoice){
        $data = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('invoice',$invoice)
        ->get();
        $in = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('invoice',$invoice)
        ->pluck('reservations.check_in');
        $out = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('invoice',$invoice)
        ->pluck('reservations.check_out');

        $in = Carbon::parse($in[0])->format('Ymd');
        $out = Carbon::parse($out[0])->format('Ymd');
        $nights = $out-$in;

        return view('invoice', compact('data','invoice','nights'));
    }

    public function printInvoice($invoice){
        $data = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('invoice',$invoice)
        ->get();

        $in = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('invoice',$invoice)
        ->pluck('reservations.check_in');
        $out = Payment::join('users','payments.user_id','=','users.id')
        ->join('reservations','payments.reservation_id','=','reservations.id')
        ->where('invoice',$invoice)
        ->pluck('reservations.check_out');

        $in = Carbon::parse($in[0])->format('Ymd');
        $out = Carbon::parse($out[0])->format('Ymd');
        $nights = $out-$in;

        // Harga sebelum pajak
        $amount = Reservation::join('rooms','reservations.room_id','=','rooms.id')
        ->where('book_code',$invoice)
        ->pluck('rooms.room_price');
        $harga = $amount[0]*$nights;

        // Pajak
        $ppn = $harga*0.1;
        $svc = $harga*0.1;

        // Total + Pajak
        $total = $harga + $ppn + $svc;

        // Terbayar
        $r_amount = Payment::where('invoice',$invoice)->pluck('remaining_amount');
        $paid = $total - $r_amount[0];

        $pdf = PDF::loadview('print.invoice',compact('data','invoice','nights','paid','ppn','svc','total','harga'));
        return $pdf->download('Invoice_'.$invoice.'.pdf');
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
        $data = Payment::join('users','payments.user_id','=','users.id')
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
    public function update(Request $req, Payment $payment)
    {
        // Hitung Sisa bayar
        $amount = $req->room_price;
        $pay = $req->pay;
        $remaining_amount = $amount - $pay;

        // Menentukan payment status
        if ($remaining_amount == $amount) {
            $payment_status = "paid half";
        } elseif ($remaining_amount == 0) {
            $payment_status = "paid";
        } elseif ($remaining_amount < 0) {
            $payment_status = "paid";
        }

        $payment = Payment::find($req->id);
        $payment->remaining_amount = $remaining_amount;
        $payment->payment_status = $payment_status;
        $payment->save();

        $res = Reservation::where('book_code',$req->invoice)->update([
            'reservation_status' => 'arrived',
            'validation' => 'success',
        ]);

        $invoice = $req->invoice;

        toast('Pembayaran sukses','success');
        return redirect('result/'.$invoice);
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
