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
        Data Aturan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Aturan</li>
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
              <a href="{{ route('tambahAturan') }}" class="btn btn-primary btn-sm mb-4">
                Tambah Data
            </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th style="text-align: center;">NO</th>
                          <th style="text-align: center;">NAMA PENYAKIT</th>
                          <th style="text-align: center;">NAMA GEJALA</th>
                          <th style="text-align: center;">CF PAKAR</th>
                          <th style="text-align: center;">KODE</th>
                          <th style="text-align: center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($aturans as $aturan)
                        <tr>
                          <td style="text-align: center;">{{ $loop->iteration }}</td>
                          <td>{{ $aturan->penyakit->nama }}</td>
                          <td>{{ $aturan->gejala->nama }}</td>
                          <td>
                            @if ($aturan->cf_pakar==0.8)
                              <p>Benar</p>
                            @elseif ($aturan->cf_pakar==0.6)
                              <p>Cukup Yakin</p>
                            @elseif ($aturan->cf_pakar==0.4)
                              <p>Mungkin</p>
                            @elseif ($aturan->cf_pakar==0.2)
                              <p>Tidak Tahu</p>
                            @else
                              <p>Tidak</p>
                            @endif
                          </td>
                          <td>{{ $aturan->kode}}</td>
                          <td>
                            <a onclick="return confirm('Anda yakin menghapus?');" href="{{ url('/dataAturan/hapus/'.$aturan->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"style="padding-right: 10px;"></i>Hapus</a>&nbsp;&nbsp;&nbsp;
                            <a href="{{ url('/dataAturan/edit/'.$aturan->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" style="padding-right: 10px;"></i>Edit
                            </a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                {{ $aturans->links() }}
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