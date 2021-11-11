<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationChart extends BaseChart
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

        $jan = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',1)
        ->whereYear('check_in',$yearNow)
        ->count();

        $feb = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',2)
        ->whereYear('check_in',$yearNow)
        ->count();

        $mar = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',3)
        ->whereYear('check_in',$yearNow)
        ->count();

        $apr = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',4)
        ->whereYear('check_in',$yearNow)
        ->count();

        $may = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',5)
        ->whereYear('check_in',$yearNow)
        ->count();

        $jun = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',6)
        ->whereYear('check_in',$yearNow)
        ->count();

        $jul = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',7)
        ->whereYear('check_in',$yearNow)
        ->count();

        $aug = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',8)
        ->whereYear('check_in',$yearNow)
        ->count();

        $sep = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',9)
        ->whereYear('check_in',$yearNow)
        ->count();

        $oct = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',10)
        ->whereYear('check_in',$yearNow)
        ->count();

        $nov = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',11)
        ->whereYear('check_in',$yearNow)
        ->count();

        $dec = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',12)
        ->whereYear('check_in',$yearNow)
        ->count();

        // ----------------------------LY-----------------

        $Lyjan = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',1)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lyfeb = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',2)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lymar = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',3)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lyapr = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',4)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lymay = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',5)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lyjun = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',6)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lyjul = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',7)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lyaug = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',8)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lysep = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',9)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lyoct = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',10)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lynov = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',11)
        ->whereYear('check_in',$yearLast)
        ->count();

        $Lydec = Reservation::where('reservation_status','success')
        ->whereMonth('check_in',12)
        ->whereYear('check_in',$yearLast)
        ->count();

        return Chartisan::build()
            ->labels(['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'])
            ->dataset(''.$yearNow.'', [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec])
            ->dataset(''.$yearLast.'', [$Lyjan, $Lyfeb, $Lymar, $Lyapr, $Lymay, $Lyjun, $Lyjul, $Lyaug, $Lysep, $Lyoct, $Lynov, $Lydec]);
    }
}