@extends('layouts.main')
@section('title','Kamar Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kamar Baru</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('admin.store') }}" method="post" class="dropzone">
            @csrf
            <div class="modal-body">
                <!-- Nama -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="room_name">Nama Kamar</label>
                            <input type="text" class="form-control" id="room_name" placeholder="Enter room's name"
                                name="room_name" value="{{ old('room_name') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tipe Kamar</label>
                            <select class="form-control select2" name="room_type" value="{{ old('room_type') }}"
                                required>
                                <option value="Standard Room">Standard Room</option>
                                <option value="Single Room">Single Room</option>
                                <option value="Twin Room">Twin Room</option>
                                <option value="Double Room">Double Room</option>
                                <option value="Family Room">Family Room</option>
                                <option value="Connecting Room">Connecting Room</option>
                                <option value="Superior Room">Superior Room</option>
                                <option value="Junior Suite Room">Junior Suite Room</option>
                                <option value="Suite Room">Suite Room</option>
                                <option value="Presidental Suite">Presidental Suite</option>
                                <option value="Special Room">Special Room</option>
                                <option value="Custom Room">Custom Room</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label for="room_price">Harga Kamar</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" id="room_price" placeholder="Enter room's price"
                                name="room_price" value="{{ old('room_price') }}" required>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label for="room_capacity">Kapasitas Kamar</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="room_capacity"
                                placeholder="Enter room's capacity" name="room_capacity"
                                value="{{ old('room_capacity') }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Person</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="bed_info">Informasi Tempat Tidur</label>
                            <input type="text" class="form-control" id="bed_info" placeholder="Enter bed's information"
                                name="bed_info" value="{{ old('bed_info') }}" required>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Fasilitas</label>
                            <select class="form-control select2" name="facility" multiple="multiple"
                                value="{{ old('facility') }}" data-placeholder="Enter facilities" required>
                                @foreach($data as $o)
                                <option value="{{ $o->facility_name }}">{{ $o->facility_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Upload Banner</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input dropzone" id="banner">
                                <label class="custom-file-label" for="banner">Choose files
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Upload Gambar Post</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input dropzone" id="photo-post">
                                <label class="custom-file-label" for="photo-post">Choose files
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <fieldset>
                    <legend>Photos</legend>


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Gambar Detail Kamar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input dropzone" id="photo-post"
                                        name="file_name[]">
                                    <label class="custom-file-label" for="photo-post">Choose files
                                    </label>
                                </div>
                            </div>

                            <div class="add-gambar" id="add-gambar"></div>

                            <button class="btn btn-primary" id="add-gambar"> <i class="fa fa-plus"></i> </button>
                            <button class="btn btn-danger" id="remove-gambar"> <i class="fa fa-times"></i> </button>
                        </div>
                    </div>

                </fieldset>

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
    //Initialize Select2 Elements
    $('.select2').select2()

</script>

<script>
    $(document).ready(function () {
        $("#add-gambar").click(function () {
            $('#add-gambar').append(
                `<div class="form-group">
                    <label>Gambar Detail Kamar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input dropzone" id="photo-post" name="file_name[]">
                            <label class="custom-file-label" for="photo-post">Choose files</label>
                        </div>
                </div>`
            )
        });
    });

</script>
@endpush
