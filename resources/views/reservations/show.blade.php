@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Reservasi</h2>

    <!-- Pencarian berdasarkan ID -->
    <form method="GET" action="{{ route('reservations.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="id" class="form-control" placeholder="Cari berdasarkan ID" required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    @if($reservations->isEmpty())
        <div class="alert alert-warning text-center">Reservasi tidak ditemukan.</div>
    @else
        <div class="row">
            @foreach($reservations as $reservation)
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $reservation->name }}</h5>
                        <p class="card-text">
                            <strong>Telepon:</strong> {{ $reservation->phone }} <br>
                            <strong>Tanggal:</strong> {{ $reservation->formatted_date }} <br>
                            <strong>Status:</strong> 
                            @if($reservation->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($reservation->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </p>

                        <strong>Layanan:</strong>
                        <ul class="list-group list-group-flush">
                            @foreach($reservation->services as $service)
                                <li class="list-group-item">{{ $service->name }}</li>
                            @endforeach
                        </ul>

                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info mt-2">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
