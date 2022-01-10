<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;

class IncomeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $yearNow = Carbon::now('GMT+8')->format('Y');
        $yearLast = $yearNow-1;

        $jan = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',1)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $feb = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',2)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $mar = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',3)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $apr = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',4)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $may = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',5)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $jun = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',6)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $jul = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',7)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $aug = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',8)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $sep = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',9)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $oct = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',10)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $nov = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',11)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        $dec = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',12)
        ->whereYear('check_in',$yearNow)
        ->sum('amount');

        // ----------------------------LY-----------------

        $Lyjan = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',1)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lyfeb = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',2)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lymar = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',3)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lyapr = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',4)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lymay = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',5)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lyjun = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',6)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lyjul = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',7)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lyaug = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',8)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lysep = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',9)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lyoct = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',10)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lynov = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',11)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        $Lydec = Payment::join('reservations','payments.reservation_id','=','reservations.id')
        ->where('payment_status','paid')
        ->whereMonth('check_in',12)
        ->whereYear('check_in',$yearLast)
        ->sum('amount');

        return Chartisan::build()
            ->labels(['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'])
            ->dataset(''.$yearNow.'', [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec])
            ->dataset(''.$yearLast.'', [$Lyjan, $Lyfeb, $Lymar, $Lyapr, $Lymay, $Lyjun, $Lyjul, $Lyaug, $Lysep, $Lyoct, $Lynov, $Lydec]);
    }
}