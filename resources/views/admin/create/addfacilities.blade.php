@extends('layouts.main')
@section('title', 'Tambah Fasilitas')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Fasilitas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('add.facilities') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" value="{{ $data->id }}" name="room_id">

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
                    Tambah Fasilitas
                </button>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

        <div class="copy d-none">
            <div class="row control-row">
                <div class="col-lg-6">
                <label>Fasilitas</label>
                    <div class="input-group mb-3">
                        <select class="form-control select2" name="facility_name[]" value="{{ old('facility_name') }}"
                            required>
                            @foreach($facilities as $o)
                            <option value="{{ $o->id }}">{{ $o->facility_name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-danger remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
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
