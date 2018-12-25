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
              <a href="{{ url('#') }}" class="btn btn-primary btn-sm mb-4">
                Tambah Data
            </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th style="text-align: center;">NO</th>
                          <th style="text-align: center;">NAMA</th>
                          <th style="text-align: center;">KODE</th>
                          <th style="text-align: center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($gejalas as $gejala)
                        <tr>
                          <td style="text-align: center;">{{ $loop->iteration }}</td>
                          <td>{{ $gejala->nama }}</td>
                          <td>{{ $gejala->kode }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                {{ $gejalas->links() }}
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
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
  })
</script>
@endpush