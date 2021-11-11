<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = User::where('access','admin')->orWhere('access','head')->get();
        return view('admin.user', compact('data'));
    }

    public function store(Request $req){
        $pass = $req->password;
        $confirm = $req->confirm;
        $email = $req->email;
        $username = $req->username;
        $isEmail = User::where('email',$email)->first();
        $isUsername = User::where('username',$username)->first();

        if (($isEmail == $email) || ($isUsername == $username)) {
            alert()->warning('Warning','Email atau Username sudah ada!');
            return redirect()->back()->withInput();
        } else {
            if ($confirm === $pass) {
                $data = new User;
                $data->name = $req->name;
                $data->email = $req->email;
                $data->username = $req->username;
                $data->phone = $req->phone;
                $data->access = $req->access;
                $data->password = bcrypt($req->password);
                $data->avatar = 'icon-user.png';
                $data->save();
                toast('Data berhasil disimpan','success');
                return redirect()->back();
    
            }else{
                alert()->warning('Warning','Password tidak cocok!');
                return redirect()->back()->withInput();
            }
        }
    }

    public function edit($id){
        $data = User::find($id);
        return view('admin.edit.user_edit', compact('data'));
    }

    public function update(Request $req){
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->username = $req->username;
        $data->phone = $req->phone;
        $data->access = $req->access;
        $data->save();
        toast('Data berhasil diubah','success');
        return redirect()->route('admin.data');
    }

    public function adminpass(Request $req){
        $old = $req->oldpass;
        $new = $req->adminpass;
        $id = Auth::user()->id;

        $data = User::find($id);

        if (Hash::check($old, $data->password)) {
            $data->password = bcrypt($new);
            $data->save();
            toast('Password changed','success');
            return redirect()->route('admin.data');
        } else {
            alert()->warning('Warning','Password salah!');
            return redirect()->back()->withInput();
        }
        
    }

    public function guest(){
        $data = User::where('access','user')->get();
        $count = count($data);
        return view('admin.guest', compact('data','count'));
    }
}
