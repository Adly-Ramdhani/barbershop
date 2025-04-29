@extends('layouts.app')

@section('content')
<div class="page-header">
  <h3 class="fw-bold mb-3">Products</h3>
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
      <a href="{{ route('products.index') }}">Products</a>
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
      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-header">
          <div class="card-title">Create Product</div>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" oninput="formatPrice(this)" />
        </div>        

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Description" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="images">Product Images</label>
            <input type="file" class="form-control" name="images[]" id="images" multiple />
            <small class="text-muted">You can upload multiple images</small>
          </div>
        </div>

        <div class="card-action">
          <button type="submit" class="btn btn-success">Submit</button>
          <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
<script>
  function formatPrice(input) {
      // Hapus semua karakter selain angka
      let value = input.value.replace(/\D/g, '');
      
      // Format angka dengan pemisah titik (untuk ribuan)
      if (value.length > 3) {
          value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      }

      // Setkan nilai kembali ke input
      input.value = value;
  }
</script>
