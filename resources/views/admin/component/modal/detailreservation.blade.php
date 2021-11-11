@foreach($detail as $o)
<div class="modal fade" id="detailReservation{{ $o->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Reservation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <!-- Kode Reservasi -->
                            <h3>#Reservation : {{ $o->book_code }}</h3>
                        </div>
                        <div class="col-6 text-right">
                            <!-- Status -->
                            @if($o->reservation_status == "cancel")
                                <h3 style="color: red;">Cancel</h3>
                            @elseif($o->reservation_status == "waiting")
                                <h3 style="color: yellow;">Waiting</h3>
                            @elseif($o->reservation_status == "arrived")
                                <h3 style="color: blue;">Arrived</h3>
                            @else
                                <h3 style="color: green;">Success</h3>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <table>
                            <tr>
                                <td>Tanggal Cancel</td>
                                <td>: {{ $o->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $o->name }}</td>
                            </tr>
                            <tr>
                                <td>Kontak</td>
                                <td>: {{ $o->phone }}</td>
                            </tr>
                            <tr>
                                <td>Negara</td>
                                <td>: {{ $o->country }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{ $o->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <p>Naradas Sambali</p>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
