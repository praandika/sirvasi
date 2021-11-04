<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = User::where('access','admin')->orWhere('access','head')->get();

        $count = count($data);

        return view('admin.user', compact('data','count'));
    }

    public function store(Request $req){
        $pass = $req->password;
        $confirm = $req->confirm;

        if ($confirm === $pass) {
            $data = new User;
            $data->name = $req->name;
            $data->email = $req->email;
            $data->username = $req->username;
            $data->phone = $req->phone;
            $data->access = $req->access;
            $data->password = $req->password;
            $data->save();
            toast('Success Toast','success')->autoClose(5000);
            return redirect()->back();
            
        }else{
            return redirect()->back()->with('errors', 'Password tidak cocok!');
        }
    }
}
