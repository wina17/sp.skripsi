@extends('layouts.backend')
@push('head_css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<div class="content-wrapper" style="height: 900px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penyakit
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data penyakit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('tambahPenyakit') }}" class="btn btn-primary btn-sm mb-4">
                Tambah Data
            </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>NO</th>
                          <th>KODE</th>
                          <th>NAMA</th>
                          <th>SOLUSI</th>
                          <th>AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($penyakits as $penyakit)
                        <tr>
                          <td style="text-align: center;">{{ $loop->iteration }}</td>
                          <td>{{ $penyakit->kode }}</td>
                          <td>{{ $penyakit->nama }}</td>
                          <td>{{ $penyakit->solusi }}</td>
                          <td>
                            <a onclick="return confirm('Anda yakin menghapus?');" href="{{ url('/dataPenyakit/hapus/'.$penyakit->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"style="padding-right: 10px;"></i>Hapus</a><br>
                            <a href="{{ url('/dataPenyakit/edit/'.$penyakit->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" style="padding-right: 10px;"></i>Edit
                            </a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                {{ $penyakits->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
@endsection
@push('body_css')
<!-- DataTables -->
<script src="{{ asset ('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endpush