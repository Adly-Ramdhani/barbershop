@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <h4 class="card-title">Daftar Reservasi</h4>
        </div>
      </div>
      <div class="card-body">
        <!-- SweetAlert Notification -->
        @if(session('success') || session('error'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "{{ session('success') ? 'Berhasil!' : 'Gagal!' }}",
                        text: "{{ session('success') ?? session('error') }}",
                        icon: "{{ session('success') ? 'success' : 'error' }}",
                        confirmButtonText: "OK"
                    });
                });
            </script>
        @endif

        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Tanggal</th>
                <th>Layanan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reservations as $index => $reservation)
              <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->phone }}</td>
                <td class="text-center">{{ $reservation->formatted_date }}</td>
                <td>
                  @foreach($reservation->services as $service)
                    <span class="badge bg-primary">{{ $service->name }}</span>
                  @endforeach
                </td>
                <td>{{ $reservation->status }}</td>
                <td class="text-center">
                  @if($reservation->status != 'confirmed' && $reservation->status != 'cancelled')
                    <!-- Approve Button -->
                    <button type="button" class="btn btn-success btn-sm approve-btn" data-id="{{ $reservation->id }}">
                      <i class="fas fa-check"></i> Approve
                    </button>
                
                    <!-- Reject Button -->
                    <button type="button" class="btn btn-danger btn-sm reject-btn" data-id="{{ $reservation->id }}">
                      <i class="fas fa-times"></i> Reject
                    </button>
                
                    <!-- Forms hidden -->
                    <form id="approve-form-{{ $reservation->id }}" action="{{ route('admin-reservations.approve', $reservation->id) }}" method="POST" class="d-none">
                      @csrf
                      @method('PATCH')
                    </form>
                    <form id="reject-form-{{ $reservation->id }}" action="{{ route('admin-reservations.reject', $reservation->id) }}" method="POST" class="d-none">
                      @csrf
                      @method('PATCH')
                    </form>
                  @endif
                </td>                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $("#basic-datatables").DataTable();

    document.querySelectorAll('.approve-btn').forEach(button => {
      button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        Swal.fire({
          title: "Konfirmasi Approve",
          text: "Apakah Anda yakin ingin menyetujui reservasi ini?",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "Ya, Approve",
          cancelButtonText: "Batal"
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById(`approve-form-${id}`).submit();
          }
        });
      });
    });

    document.querySelectorAll('.reject-btn').forEach(button => {
      button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        Swal.fire({
          title: "Konfirmasi Reject",
          text: "Apakah Anda yakin ingin menolak reservasi ini?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Ya, Reject",
          cancelButtonText: "Batal"
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById(`reject-form-${id}`).submit();
          }
        });
      });
    });
  });
</script>
@endpush
