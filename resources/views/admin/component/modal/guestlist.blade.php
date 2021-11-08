<div class="modal fade" id="cekUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Tamu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                <table id="tabelGuest" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tamu</th>
                            <th>Kontak</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Negara</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @forelse($user as $o)
                        <tr id="guestdata" class="klikguest" data-guestId="{{ $o->id }}" data-name="{{ $o->name }}" data-email="{{ $o->email }}"
                            data-phone="{{ $o->phone }}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $o->name }}</td>
                            <td>{{ $o->phone }}</td>
                            <td>{{ $o->email }} Person</td>
                            <td>{{ $o->address }}</td>
                            <td>{{ $o->country }}</td>
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
                            <th>Tamu</th>
                            <th>Kontak</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Negara</th>
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
    $(document).on('click', '.klikguest', function (e) {
        document.getElementById("user_id").value = $(this).attr('data-guestId');
        document.getElementById("name").value = $(this).attr('data-name');
        document.getElementById("phone").value = $(this).attr('data-phone');
        document.getElementById("email").value = $(this).attr('data-email');
        $('#cekUser').modal('hide');
    });
</script>

<script>
    $(function () {
        $("#tabelGuest").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
        });
    });

</script>
@endpush
