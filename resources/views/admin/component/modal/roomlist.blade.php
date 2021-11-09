<div class="modal fade" id="cekKamar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tabelRoom" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kamar</th>
                                <th>Tipe Kamar</th>
                                <th>Harga</th>
                                <th>Kapasitas</th>
                                <th>Bed Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($room as $o)
                            <tr id="guestdata" class="klikroom" data-roomId="{{ $o->id }}"
                                data-roomName="{{ $o->room_name }}" data-roomPrice="{{ $o->room_price }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $o->room_name }}</td>
                                <td>{{ $o->room_type }}</td>
                                <td>{{ $o->room_price }} Person</td>
                                <td>{{ $o->room_capacity }}</td>
                                <td>{{ $o->bed_info }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">no data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Kamar</th>
                                <th>Tipe Kamar</th>
                                <th>Harga</th>
                                <th>Kapasitas</th>
                                <th>Bed Info</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('after-script')
<script>
    //passing data ke input text
    $(document).on('click', '.klikroom', function (e) {
        document.getElementById("room_id").value = $(this).attr('data-roomId');
        document.getElementById("room_price").value = $(this).attr('data-roomPrice');
        document.getElementById("room").value = $(this).attr('data-roomName');
        $('#cekKamar').modal('hide');
    });

</script>

<script>
    $(function () {
        $("#tabelRoom").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
        });
    });

</script>
@endpush
