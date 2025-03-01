@extends('layouts.app')

@section('content')
<div class="page-header">
  <h3 class="fw-bold mb-3">Services</h3>
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
      Create
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <form action="{{ route('services.store') }}" method="post">
        @csrf

        <div class="card-header">
          <div class="card-title">Create Services</div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control form-control" name="name" id="name" placeholder="Name" />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Description" rows="5"></textarea>
          </div>
        </div>
        <div class="card-action">
          <button type="submit" class="btn btn-success">Submit</button>
          <a href="{{ route('services.index') }}" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection