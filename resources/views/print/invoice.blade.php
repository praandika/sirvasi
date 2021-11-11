<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invoice }}</title>
    <style>
        body {
            font-family: 'Calibri', 'sans-serif';
        }

        .row,
        .col-lg-12 {
            width: 100%;
        }

        .col-lg-6 {
            width: 50%;
        }

        .table {
            padding: 8px;
        }

        .table-striped tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #F1E9E5;
        }

        .invoice {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .invoice td,
        .invoice th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .invoice tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .invoice tr:hover {
            background-color: #ddd;
        }

        .invoice th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #00A19D;
            color: white;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <h3>
                <strong>
                    Naradas Sambali Rooms & Restaurant Lembongan
                </strong>
            </h3>
            <p>
                Mushroom Bay II, Nusa Lembongan, Jungutbatu, Jungutbatu, Klungkung Regecy, Kabupaten Klungkung, Bali
            </p>
            <p>
                0812-3606-8887
            </p>
        </div>
        <hr>
    </div>
    @foreach($data as $o)
    <table class="table table-striped">
        <tr>
            <th>To</th>
            <th>Invoice</th>
            <th>Date</th>
            <th>Payment Status</th>
        </tr>
        <tr>
            <td>
                {{ $o->user->name }} <br>
                {{ $o->user->address }} <br>
                Phone : {{ $o->user->phone }} <br>
                Email : {{ $o->user->email }}
            </td>
            <td>
                {{ $o->invoice }}
            </td>
            <td>
                {{ Carbon\Carbon::parse($o->reservation->check_in)->format('d-m-Y') }}
            </td>
            <td style="text-align: right"><h1><strong>{{ strtoUpper($o->payment_status) }}</strong></h1></td>
        </tr>
    </table>
    <table class="invoice">
        <tr>
            <th>Room</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Stay</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>{{ $o->reservation->room->room_name }}</td>
            <td>{{ Carbon\Carbon::parse($o->reservation->check_in)->format('D d M Y, H:i') }}</td>
            <td>{{ Carbon\Carbon::parse($o->reservation->check_out)->format('D d M Y, H:i') }}</td>
            <td>{{ $nights }} Nights(s)</td>
            <th>Rp {{ number_format($harga, 2, ',', '.')}}</th>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>PPN 10%</td>
            <th>Rp {{ number_format($ppn, 2, ',', '.') }}</th>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Service Charge 10%</td>
            <th>Rp {{ number_format($svc, 2, ',', '.') }}</th>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Total</td>
            <th>Rp {{ number_format($total, 2, ',', '.') }}</th>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Paid</td>
            <th>Rp {{ number_format($paid, 2, ',', '.') }}</th>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Remaining Amount</td>
            <th>Rp {{ number_format($o->remaining_amount, 2, ',', '.')}}</th>
        </tr>
    </table>
    <br><br>

    <strong>Message:</strong>
    <p>
        Dear, <br>
        Mr/Ms/Miss, {{ $o->user->name }} <br><br>
        We are waiting for your arrival <br>
        see you in Nusa Lembongan <br>
        Happy holiday!
        <br>
        <br>
        Best regards, <br>
        Naradas Sambali Rooms & Restaurant
    </p>

    @endforeach
</body>

</html>
