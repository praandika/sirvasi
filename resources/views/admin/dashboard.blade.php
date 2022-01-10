@extends('layouts.main')
@if(Auth::user()->access == "user")
@section('title','Member Area')
@else
@section('title','Dashboard')
@endif

@section('content')
@if(Auth::user()->access == "user")
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Your Current Reservation</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Rp {{ number_format($sum_half, 0, ',', '.') }}</h3>

                        <p>Remaining Amount</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Rp {{ number_format($sum_unpaid, 0, ',', '.') }}</h3>

                        <p>Unpaid</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>

            @if($room_future->isEmpty())
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <strong>No reserved rooms</strong>

                        <p>Want to holiday?</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-closed"></i>
                    </div>
                    <a href="{{ route('landing.page') }}" class="small-box-footer">
                        Book Now <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $room_future[0]['room_name'] }}</h3>

                        <p>{{ $room_future[0]['reservation_status'] }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-closed"></i>
                    </div>
                </div>
            </div>
            @endif

            @if($current_room->isEmpty())
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <strong>No reserved rooms</strong>

                        <p>Want to holiday?</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <a href="{{ route('landing.page') }}" class="small-box-footer">
                        Book Now <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>

                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Code</th>
                        <th>Room Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->book_code }}</td>
                        <td>{{ $o->room_name }}</td>
                        <td>{{ $o->check_in }}</td>
                        <td>{{ $o->check_out }}</td>
                        <td>
                            @if($o->validation == "wait")
                            <button class="btn btn-secondary" disabled data-toggle="tooltip" data-placement="top"
                                title="Please wait for validation"><i class="fas fa-hourglass-half"></i>
                                Validation</button>
                            @elseif($o->validation == "no")
                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                title="Please book another room"><i class="far fa-frown"></i> Full booked</button>
                            @elseif($o->validation == "yes")
                            <a href="{{ url('pay/'.$o->id.'/'.$o->check_in.'/'.$o->check_out.'/'.$o->room_price.'/'.$o->book_code.'/'.$o->room_name.'/edit') }}"
                                class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Pay now"><i
                                    class="far fa-laugh-wink"></i> Pay</a>
                            @else
                            <button class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                title="Happy holiday!"><i class="far fa-smile-wink"></i> Full booked</button>
                            @endif
                        </td>
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
                        <th>Book Code</th>
                        <th>Room Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endif

@if((Auth::user()->access == "admin") || (Auth::user()->access == "head") )
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $countNewBook }}</h3>

                <p>New Reservation</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="{{ route('validation') }}" class="small-box-footer">
                Validate Now <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $countBooked }}</h3>

                <p>Booked Room</p>
            </div>
            <div class="icon">
                <i class="fas fa-door-closed"></i>
            </div>
            <a href="#" class="small-box-footer">
                This year <i class="fas fa-info-circle"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $countGuest }}</h3>

                <p>Active Guests</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
                This month <i class="fas fa-info-circle"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $countCancel }}</h3>

                <p>Canceled Reservation</p>
            </div>
            <div class="icon">
                <i class="fas fa-times"></i>
            </div>
            <a href="#" class="small-box-footer">
                This month <i class="fas fa-info-circle"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Paid</span>
                <span class="info-box-number">Rp {{ number_format($sum_paid, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-hourglass-half"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Paid Half</span>
                <span class="info-box-number">Rp {{ number_format($sum_half, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Unpaid</span>
                <span class="info-box-number">Rp {{ number_format($sum_unpaid, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Chart's container -->
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Reservation {{ $yearNow }} vs {{ $yearLast }}</h5>
            <div id="chart" style="height: 300px;"></div>
        </div>
    </div>

<!-- Chart's container -->
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Income {{ $yearNow }} vs {{ $yearLast }}</h5>
            <div id="chartIncome" style="height: 300px;"></div>
        </div>
    </div>
@endif
@endsection

@push('after-script')
<!-- Charting library -->
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<!-- Your application script -->
<script>
    const chart = new Chartisan({
        el: '#chart',
        url: '@chart("reservation_chart")',
        hooks: new ChartisanHooks()
        .legend({ position: 'bottom' })
    });

</script>

<script>
    const chartIncome = new Chartisan({
        el: '#chartIncome',
        url: '@chart("income_chart")',
        hooks: new ChartisanHooks()
        .colors(['#ECC94B', '#4299E1'])
        .legend({ position: 'bottom' })
    });

</script>
@endpush
