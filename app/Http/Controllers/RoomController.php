<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Facility;
use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        $count = count($data);
        return view('admin.room', compact('data','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Facility::all();
       
        return view('admin.create.room_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
            $isHook = Room::all();
            $count = count($isHook) + 1;
            $hook = Carbon::now('GMT+8')->format('YmdHis')."hook".$count;
    
            $banner = $req->file('banner');
            $featured = $req->file('featured_img');

            $banner_file = time()."_".$banner->getClientOriginalName();
            $featured_file = time()."_".$featured->getClientOriginalName();
    
            $dir_banner = 'photos/banner';
            $dir_featured = 'photos/featured';
            $dir_post = 'photos/post';

            $banner->move($dir_banner,$banner_file);
            $featured->move($dir_featured,$featured_file);

            $data = new Room;
            $data->hook = $hook;
            $data->room_name = $req->room_name;
            $data->room_type = $req->room_type;
            $data->room_price = $req->room_price;
            $data->room_capacity = $req->room_capacity;
            $data->bed_info = $req->bed_info;
            
            $data->banner = $banner_file;
            $data->featured_img = $featured_file;
            $data->save();
            
            if ($req->hasFile('post_img')) {
                $allowedExtension = ['jpg','jpeg','png'];               

                for ($i=0; $i < count($req->file('post_img')); $i++) { 
                    
                    $post_file = time()."_".$req->file('post_img')[$i]->getClientOriginalName();
                    $ext = $req->file('post_img')[$i]->getClientOriginalExtension();

                    $check = in_array($ext,$allowedExtension);

                    if ($check) {
                        $req->file('post_img')[$i]->move($dir_post,$post_file);

                        $media = Media::create([
                            'room_hook' => $hook,
                            'post_img' => $post_file[$i],
                        ]);

                    }else{
                        alert()->warning('Warning','Password salah!');
                        return redirect()->back()->withInput();
                    }
                }
                
            }

            toast('Data berhasil disimpan','success')->autoClose(5000);
            return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
