@extends('layouts.main')
@section('title','Payment')

@section('content')
<form action="{{ route('payment.update') }}" method="POST" target="_blank">
    @csrf
    <div class="card" id="payment-card">
        <div class="card-header">
            <h3 class="card-title">Pembayaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" name="id" value="{{ $id }}">
                    @foreach($data as $o)
                    <input type="hidden" id="room_price" name="room_price" value="{{ $o->remaining_amount }}">
                    <table class="table table-striped">
                        <tr>
                            <td>Invoice #</td>
                            <td>: {{ $o->invoice }}</td>
                            <input type="hidden" name="invoice" value="{{ $o->invoice }}">
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $o->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ $o->email }}</td>
                        </tr>
                        <tr>
                            <td>Kontak</td>
                            <td>: {{ $o->phone }}</td>
                        </tr>
                        <tr>
                            <td>Penerima</td>
                            <td>: {{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>: {{ $o->payment_type }}</td>
                        </tr>
                    </table>
                    
                </div>

                <div class="col-lg-6">
                    <table>
                        <tr>
                            <td>Kamar</td>
                            <td>: {{ $o->reservation->room->room_name }}</td>
                        </tr>
                        <tr>
                            <td>Check In</td>
                            <td>: {{ $o->check_in }}</td>
                        </tr>
                        <tr>
                            <td>Check Out</td>
                            <td>: {{ $o->check_out }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Tamu</td>
                            <td>: {{ $o->guest_count }}</td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>: {{ $o->note }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>: <span id="amount">Rp {{ number_format($o->remaining_amount, 0, ',', '.') }}</span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Bayar</h4>
                            </td>
                            <td><input type="text" id="pay" onkeyup="hitung()" name="pay"></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Sisa</h4>
                            </td>
                            <td><span id="remaining_amount">Rp {{ number_format($o->remaining_amount, 0, ',', '.') }}</span></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>
                                <h4><span id="payment_status" style="color: orange;">{{ strtoUpper($o->payment_status) }}</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @if($o->remaining_amount == 0)
            <button type="submit" class="btn btn-primary" disabled>Bayar</button>
            @else
            <button type="submit" class="btn btn-primary">Bayar</button>
            @endif
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</form>
@endsection

@push('after-script')
<script>

    function hitung() {
        let total = document.getElementById("room_price").value;
        let bayar = document.getElementById("pay").value;

        let sisa = total - bayar;
        document.getElementById("remaining_amount").innerHTML = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(sisa);
        if (sisa == total) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "PAID HALF";
            ele.style.color = "orange";
        } else if (sisa == 0) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "PAID";
            ele.style.color = "green";
        } else if (sisa < 0) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "CHANGES";
            ele.style.color = "blue";
        }

        console.log(total, bayar, sisa);
    }

</script>
@endpush
