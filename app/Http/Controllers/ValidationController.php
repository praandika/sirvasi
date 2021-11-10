<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Reservation::where('validation','wait')
        ->orderBy('check_in','asc')
        ->get();
        return view('admin.validation', compact('data'));
    }

    public function validationProccess(Request $req){
        $res = Reservation::find($req->id);
        $res->validation = "yes";
        $res->save();
        toast('Data berhasil divalidasi','success');
        return redirect()->back();
    }

    public function validationCancel(Request $req){
        $res = Reservation::find($req->id);
        $res->validation = "no";
        $res->save();
        toast('Data berhasil dicancel','success');
        return redirect()->back();
    }
}
