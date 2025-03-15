@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Reservasi</h2>

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
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                        <!-- Tombol Approve -->
                        <form action="{{ route('admin-reservations.approve', $reservation->id) }}" method="POST" class="d-inline approval-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm approve-btn">
                                <i class="fas fa-check"></i> Approve
                            </button>
                        </form>

                        <!-- Tombol Reject -->
                        <form action="{{ route('admin-reservations.reject', $reservation->id) }}" method="POST" class="d-inline rejection-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm reject-btn">
                                <i class="fas fa-times"></i> Reject
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- SweetAlert Konfirmasi -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.approve-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Konfirmasi Approve",
                    text: "Apakah Anda yakin ingin menyetujui reservasi ini?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Approve",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest("form").submit();
                    }
                });
            });
        });

        document.querySelectorAll('.reject-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Konfirmasi Reject",
                    text: "Apakah Anda yakin ingin menolak reservasi ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Reject",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest("form").submit();
                    }
                });
            });
        });
    });
</script>

@endsection
