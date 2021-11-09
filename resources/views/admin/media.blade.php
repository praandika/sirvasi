@extends('layouts.main')
@section('title','Foto Kamar')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Foto</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="modal-body">
            <div class="row">
                @foreach($data as $o)

                <div class="col-lg-4 mx-auto">
                    <img src="{{ asset('photos/post/'.$o->post_img) }}" alt="" width="270px">
                    <div class="row">
                        <a href="{{ url('media/'.$o->id.'/'.$o->room_id.'/edit') }}" type="button" class="btn btn-success m-3"
                            id="button-addon2"><i class="fas fa-pencil-alt"></i> Ubah</a>
                        <form action="{{ route('media.delete',$o->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="prev_post_img" value="{{ $o->post_img }}">
                            <button type="submit" class="btn btn-danger m-3" id="button-addon2"><i class="fas fa-trash"
                                    onclick="tanya()"></i> Hapus</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="modal-footer justify-content-between">
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

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
