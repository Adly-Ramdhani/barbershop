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
      Show
    </li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Product Details</div>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <p>{{ $product->name }}</p>
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <p>{{ number_format($product->price, 0, ',', '.') }}</p>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <p>{{ $product->description }}</p>
        </div>

        <div class="form-group">
          <label for="images">Product Images</label>
          @foreach($product->images as $image)
          <div>
            <img src="{{ asset($image->image_path) }}" alt="{{ $product->name }}" class="product-img" style="max-width: 200px;">
          </div>
          @endforeach
        </div>
      </div>

      <div class="card-action">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
      </div>
    </div>
  </div>
</div>
@endsection
