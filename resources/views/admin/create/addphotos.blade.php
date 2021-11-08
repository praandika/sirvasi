@extends('layouts.main')
@section('title', 'Tambah Foto')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Foto</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('add.photos') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                    <div class="row">
                        <input type="text" value="{{ $data->id }}" name="room_id">

                        <div class="col-lg-12">

                            <div class="form-group">
                                <label for="room_name">Nama Kamar : {{ $data->room_name }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="wrapper-facilities" id="wrapper-facilities">
                        <!-- Container input dinamis -->
                    </div>

                    <button type="button" class="btn btn-success add">
                        Tambah Foto
                    </button>

                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>

        <div class="copy d-none">
            <div class="row control-row">
                <div class="col-lg-12">
                    <label style="display: block;">Upload Foto Kamar</label>
                    <div class="input-file mb-3">
                        <input type="file" class="dropzone" id="photo-post" name="post_img[]"
                            style="border: 1px dashed grey; padding: 10px; border-radius: 4px; width:80%">
                    </div>
                </div>
                <button type="button" class="btn btn-danger remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @endsection

    @push('after-script')
    <script>
        $(document).ready(function () {
            $(".add").click(function () {
                let html = $(".copy").html();
                $(".wrapper-facilities").append(html);
            });
        });

        $("body").on("click", ".remove", function () {
            $(this).parents(".control-row").remove();
        });

    </script>
    @endpush
