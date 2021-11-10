@extends('layouts.main')
@section('title','Payment')

@section('content')
<form action="{{ route('payment.store') }}" method="POST">
    @csrf
    <div class="card" id="payment-card">
        <div class="card-header">
            <h3 class="card-title">Pembayaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" name="id" value="{{ $id }}">
                    @foreach($data as $o)
                    <table>
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
                            <td>: {{ $o->room_name }}</td>
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
                        @endforeach
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>: <span id="amount"></span></td>
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
                            <td><span id="remaining_amount"></span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <h4><span id="payment_status" style="color: red;">UNPAID</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <a href="javascript:void(0);" class="btn btn-primary" id="previous" onclick="back()">Kembali</a>
            <button type="submit" class="btn btn-primary">Bayar</button>
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
            ele.innerHTML = "UNPAID";
            ele.style.color = "red";
        } else if (sisa == 0) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "PAID";
            ele.style.color = "green";
        } else if (sisa < 0) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "CHANGES";
            ele.style.color = "blue";
        } else {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "PAID HALF";
            ele.style.color = "orange";
        }

        console.log(total, bayar, sisa);
    }

    function back(){
        let reservasi = document.getElementById("reservation-card");
        let payment = document.getElementById("payment-card");
        reservasi.classList.remove("d-none");
        payment.classList.add("d-none");
    }

</script>
@endpush
