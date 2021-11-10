<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Facility;
use App\Models\RoomFacilities;
use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomController extends Controller
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
        $data = Room::orderBy('created_at','desc')->get();
        return view('admin.room', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $banner = $req->file('banner');
        $featured = $req->file('featured_img');

        $banner_file = time()."_".$banner->getClientOriginalName();
        $featured_file = time()."_".$featured->getClientOriginalName();
    
        $dir_banner = 'photos/banner';
        $dir_featured = 'photos/featured';

        $banner->move($dir_banner,$banner_file);
        $featured->move($dir_featured,$featured_file);

        $data = new Room;
        $data->room_name = $req->room_name;
        $data->room_type = $req->room_type;
        $data->room_price = $req->room_price;
        $data->room_capacity = $req->room_capacity;
        $data->bed_info = $req->bed_info;
            
        $data->banner = $banner_file;
        $data->featured_img = $featured_file;
        $data->save();

        toast('Data berhasil disimpan','success');
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

    public function roomFacilities($id){
        $data = Room::find($id);
        $facilities = Facility::all();
        return view('admin.create.addfacilities', compact('data','facilities'));
    }

    public function roomFacilitiesStore(Request $req){
        for ($i=0; $i < count($req->facility_name); $i++) { 
            RoomFacilities::create([
                'facilities_id' => $req->facility_name[$i],
                'room_id' => $req->room_id,
            ]);
        }

        toast('Fasilitas berhasil ditambah','success');
        return redirect()->route('room.index');
    }

    public function roomPhotos($id){
        $data = Room::find($id);
        return view('admin.create.addphotos', compact('data'));
    }

    public function roomPhotosStore(Request $req){
        if($req->hasfile('post_img')){
            foreach($req->post_img as $photos){
                $photo_name = time()."_".$photos->getClientOriginalName();
                $dir_post = 'photos/post';
                $photos->move($dir_post, $photo_name);
                Media::create([
                    'room_id' => $req->room_id,
                    'post_img' => $photo_name
                ]);
            }
        }

        toast('Foto berhasil ditambah','success');
        return redirect()->route('room.index');

        // for ($i=0; $i < count($req->post_img); $i++) { 
        //     $post_img[] = $req->file('post_img')[$i];
        //     $foto_file = time()."_".$post_img[]->getClientOriginalName()[$i];
        //     $dir_post = 'photos/post';
        //     $post_img->move($dir_post,$foto_file);

        //     Media::create([
        //         'room_id' => $req->room_id,
        //         'post_img' => $req->$foto_file,
        //     ]);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.edit.room_edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Room $room)
    {
        if ($req->hasfile('banner') && $req->hasfile('featured')) {
            $banner = $req->prev_banner;
            $featured = $req->prev_featured;
            unlink("photos/banner/".$banner);
            unlink("photos/featured/".$featured);

            $banner = $req->file('banner');
            $featured = $req->file('featured');

            $banner_file = time()."_".$banner->getClientOriginalName();
            $featured_file = time()."_".$featured->getClientOriginalName();
    
            $dir_banner = 'photos/banner';
            $dir_featured = 'photos/featured';

            $banner->move($dir_banner,$banner_file);
            $featured->move($dir_featured,$featured_file);

            $room->banner = $banner_file;
            $room->featured_img = $featured_file;
            $room->room_name = $req->room_name;
            $room->room_type = $req->room_type;
            $room->room_price = $req->room_price;
            $room->room_capacity = $req->room_capacity;
            $room->bed_info = $req->bed_info;
            $room->update();
            
        }elseif ($req->hasfile('banner')) {
            $banner = $req->prev_banner;
            unlink("photos/banner/".$banner);

            $banner = $req->file('banner');

            $banner_file = time()."_".$banner->getClientOriginalName();
    
            $dir_banner = 'photos/banner';

            $banner->move($dir_banner,$banner_file);

            $room->banner = $banner_file;
            $room->room_name = $req->room_name;
            $room->room_type = $req->room_type;
            $room->room_price = $req->room_price;
            $room->room_capacity = $req->room_capacity;
            $room->bed_info = $req->bed_info;
            $room->update();
            
        }elseif ($req->hasfile('featured')){
            $featured = $req->prev_featured;
            unlink("photos/featured/".$featured);

            $featured = $req->file('featured');

            $featured_file = time()."_".$featured->getClientOriginalName();
    
            $dir_featured = 'photos/featured';

            $featured->move($dir_featured,$featured_file);

            $room->featured_img = $featured_file;
            $room->room_name = $req->room_name;
            $room->room_type = $req->room_type;
            $room->room_price = $req->room_price;
            $room->room_capacity = $req->room_capacity;
            $room->bed_info = $req->bed_info;
            $room->update();

        }else{
            $room->room_name = $req->room_name;
            $room->room_type = $req->room_type;
            $room->room_price = $req->room_price;
            $room->room_capacity = $req->room_capacity;
            $room->bed_info = $req->bed_info;
            $room->update();
        }
        
        toast('Data berhasil diubah','success');
        return redirect()->back();
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
