@extends('layouts.main')
@section('title','Edit Foto Posting')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ubah Foto</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ url('media/'.$data->id.'/'.$data->room_id.'/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <input type="hidden" name="prev_post_img_update" value="{{ $data->post_img }}">
                        <img src="{{ asset('photos/post/'.$data->post_img) }}" alt="" width="270px">
                        <div class="input-group mb-3">

                            <input type="file" class="dropzone form-control" id="photo-post" name="post_img"
                                style="border: 1px dashed grey; padding: 10px; border-radius: 4px; width:80%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection

@push('after-script')
<script>
    function tanya() {
        if (confirm('Yakin hapus data ini?')) {
            return true;
        } else {
            return false;
        }
    }

</script>
@endpush
