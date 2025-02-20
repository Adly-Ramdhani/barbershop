@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <h4 class="card-title">Data Services</h4>
          <a href="{{ route('services.create') }}" class="btn btn-primary btn-round ms-auto">
            <i class="fa fa-plus"></i> Add Data
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th> 
                <th>Description</th> 
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($services as $i => $servicess)
              <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $servicess->name }}</td>
                <td>{{ $servicess->description }}</td>
                <td> 
                  <a href="{{ route('services.edit', $servicess->id) }}" class="btn btn-warning btn-sm">Edit</a>


                   <!-- Tombol Delete -->
                   <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $servicess->id }}">
                      Delete
                   </button>

                   <!-- Modal Delete -->
                   <div class="modal fade" id="deleteUserModal{{ $servicess->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Apakah Anda yakin ingin menghapus layanan <strong>{{ $servicess->name }}</strong>?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('services.destroy', $servicess->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                          </div>
                        </div>
                      </div>
                   </div>
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
    $("#basic-datatables").DataTable({});
  });
</script>
@endpush
