@extends('layouts.master')

@section('content')


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Artikel List</h1>

          <div class="card">
              <div class="card-header d-flex justify-content-between">
                  <h3>Artikel user</h3>
                  <a href="{{ url('/artikel/create') }}" class="btn btn-primary " title="Add New Article">Buat Artikel</a>
              </div>

              @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
              <div class="card-body table-responsive">
                  <table id="dataTable" class="table dataTable table-striped table-hover">
                      <thead>
                            <th>No</th>
                            <th>Judul Artikel</th>
                            <th>Slug</th>
                            <th>Tag</th>
                            <th style="text-align:center">Aksi</th>
                      </thead>
                      <tbody>
                        @foreach($item as $art)
                          <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $art->judul }}</td>
                                <td>{{ $art->slug }}</td>
                                <td>{{ $art->tag }}</td>
                                <td style="text-align:center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ url('artikel/'.$art->id.'/show') }}" class="btn btn-primary btn-sm" title="Baca Artikel">lihat</a>
                                      <a href="{{ url('artikel/'.$art->id.'/edit') }}" class="btn btn-sm btn-success" title="Edit Artikel">edit</a>
                                      <form action="{{ url('artikel/'.$art->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-danger btn-sm" title="Hapus Artikel">delete</button>
                                      </form> 
                                    </div> 
                                  </td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->





@endsection


@push('scripts')
  <script src="{{ asset('sbadmin2/js/swal.min.js') }}"></script>
  <script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
  </script>


@endpush

@push('jsdataTable')

  <!-- Page level custom scripts -->
  <script src="{{ asset('sbadmin2/js/demo/datatables-demo.js') }}"></script>
@endpush