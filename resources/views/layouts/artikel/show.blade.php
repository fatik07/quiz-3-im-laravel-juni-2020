@extends('layouts.master')

@section('content')


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Baca Artikel</h1>

          <div class="card">
                <div class="card-header">
                  <h3>judul : {{ $artikel->judul}}</h3>
                </div>
                <div class="card-body">
                  <p> isi : {{ $artikel->isi }}</p>                  
                </div>
                <div class="card-footer">
                  <p class="text-body">
                      @foreach(explode(',', $artikel->tag) as $tag=>$value)
                        <p class="btn btn-primary">{{ $value }} </p>
                      @endforeach
                    </p>
                    <a href="{{ url('artikel') }}" class="card-link text-danger"><i class="fa fa-arrow-left"></i> <strong>Kembali</strong></a>
                </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->





@endsection