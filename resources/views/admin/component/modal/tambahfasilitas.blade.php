<div class="modal fade" id="tambahFasilitas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Fasilitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('facilities.store') }}" method="post" id="store-form">
                @csrf
                <div class="modal-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="facility_name">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="facility_name" placeholder="Enter facilities name"
                            name="facility_name" value="{{ old('facility_name') }}" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
