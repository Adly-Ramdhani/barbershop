@extends('layouts.app')

@section('content')
<div class="page-header">
  <h3 class="fw-bold mb-3">Edit Service</h3>
  <ul class="breadcrumbs mb-3">
    <li class="nav-home">
      <a href="{{ route('home') }}">
        <i class="icon-home"></i>
      </a>
    </li>
    <li class="separator">
      <i class="icon-arrow-right"></i>
    </li>
    <li class="nav-item">
      <a href="{{ route('services.index') }}">Services</a>
    </li>
    <li class="separator">
      <i class="icon-arrow-right"></i>
    </li>
    <li class="nav-item">
      Edit
    </li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      {{-- Pastikan form mengarah ke update, bukan store --}}
      <form action="{{ route('services.update', $service->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="card-header">
          <div class="card-title">Edit Service</div>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" 
                   placeholder="Name" value="{{ old('name', $service->name) }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" 
                      placeholder="Description" rows="5" required>{{ old('description', $service->description) }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="card-action">
          <button type="submit" class="btn btn-success">Update</button>
          <a href="{{ route('services.index') }}" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
