<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($room_id){
        $data = Media::join('rooms','media.room_id','=','rooms.id')
        ->where('room_id',$room_id)
        ->get('media.*','rooms.id','rooms.room_name');
        return view('admin.media', compact('data'));
    }

    public function edit($id, $room){
        $data = Media::find($id);
        return view('admin.edit.media_edit', compact('data'));
    }

    public function update(Request $req, $id, $room){
        if ($req->hasfile('post_img')) {
            $post_prev = $req->prev_post_img_update;
            unlink("photos/post/".$post_prev);

            $post = $req->file('post_img');

            $post_file = time()."_".$post->getClientOriginalName();

            $dir_post = 'photos/post';

            $post->move($dir_post,$post_file);

            $media = Media::find($req->id);
            $media->post_img = $post_file;
            $media->save();
        }else{
            alert()->warning('Warning','Tidak ada file yang diupload!');
            return redirect()->back();
        }

        toast('Data berhasil diubah','success');
        return redirect('media/'.$room.'/show');
    }

    public function delete(Request $req, $id){
        $foto = $req->prev_post_img;
        unlink("photos/post/".$foto);
        Media::destroy($id);
        toast('Data berhasil dihapus','success');
        return redirect()->back();
    }
}
