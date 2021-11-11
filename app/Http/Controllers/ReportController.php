<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Clockwork\Storage\Search;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReservationExport;

class ReportController extends Controller
{
    public function index(){
        $data = Reservation::all();
        return view('admin.report', compact('data'));
    }

    public function search(Request $req){
        $awal = $req->awal;
        $akhir = $req->akhir;
        $data = Reservation::whereBetween('check_in', [$awal, $akhir])->get();
        return view('admin.report_cari', compact('data','awal','akhir'));
    }

    public function exportExcel($awal, $akhir){
        return (new ReservationExport)->awal($awal)->akhir($akhir)->download('Reservation_report_'.$awal.'-'.$akhir.'.xlsx');
    }
}
