<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $pass = $req->input('password');
        $confirm = $req->input('confirm');

        if ($confirm === $pass) {
            User::insert([
                'email' => $req->input('email'),
                'username' => $req->input('username'),
                'phone' => $req->input('phone'),
                'access' => $req->input('access'),
                'password' => bcrypt($req->input('password')),
            ])->save();

            return redirect('user.data')->toast('Success Toast','success')->autoClose(5000);
        }else{
            return redirect()->back();
        }
    }
}
