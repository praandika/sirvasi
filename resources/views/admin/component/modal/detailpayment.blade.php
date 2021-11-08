@foreach($detail as $o)
<div class="modal fade" id="detailPayment{{ $o->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <!-- Kode Reservasi -->
                            <h3>
                                #Transaksi : 
                                <a href="{{ route('reservation.show',$o->id) }}">{{ $o->book_code }}</a>
                            </h3>
                            
                        </div>
                        <div class="col-6 text-right">
                            <!-- Status -->
                            @if($o->payment_status == "unpaid")
                                <h3 style="color: red;">Unpaid</h3>
                            @elseif($o->payment_status == "paid half")
                                <h3 style="color: yellow;">Paid Half</h3>
                            @else
                                <h3 style="color: green;">Paid</h3>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <table>
                            <tr>
                                <td>Check In / Out</td>
                                <td>: {{ $o->check_in}} / {{ $o->check_out }}</td>
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
                                <td>Alamat</td>
                                <td>: {{ $o->address }}</td>
                            </tr>
                            <tr>
                                <td>Tipe Pembayaran</td>
                                <td>: {{ $o->payment_type }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>: <h3>{{ $o->amount }}</h3></td>
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
