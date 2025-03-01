@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h4 class="card-title">Show Service</h4>
        <a href="{{ route('services.index') }}" class="btn btn-secondary btn-round ms-auto">
          <i class="fa fa-arrow-left"></i> Kembali
        </a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <th>Name</th>
              <th>Description</th>
            </tr>
            <tr>
              <td>{{ $service->name }}</td>
              <td>{{ $service->description }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection