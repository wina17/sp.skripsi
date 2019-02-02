@extends('layouts.backend')
@push('head_css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper" style="height: 900px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              @if(Session::has('pesan'))
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" style="margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <h4><i class="fa fa-check"></i>{{ Session::get('pesan') }}</h4>  
                    </div>
                </div>
              @endif
              <a href="{{ route('tambahArtikel') }}" class="btn btn-primary btn-sm mb-4">
                Tambah Data
            </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th style="text-align: center;">NO</th>
                          <th style="text-align: center;">JUDUL ARTIKEL</th>
                          <th style="text-align: center;">NAMA PENULIS</th>
                          <th style="text-align: center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($artikels as $artikel)
                        <tr>
                          <td style="text-align: center;">{{ $loop->iteration }}</td>
                          <td>{{ $artikel->nama }}</td>
                          <td>{{ $artikel->detail }}</td>
                          <td>{{ $artikel->pertanyaan }}</td>
                          <td>{{ $artikel->kode }}</td>
                          <td>
                            <a onclick="return confirm('Anda yakin menghapus?');" href="{{ url('/dataGejala/hapus/'.$artikel->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"style="padding-right: 10px;"></i>Hapus</a>
                            <a href="{{ url('/dataGejala/edit/'.$artikel->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" style="padding-right: 10px;"></i>Edit
                            </a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                {{ $artikels->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
@endsection
@push('body_css')
<!-- DataTables -->
<script src="{{ asset ('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endpush