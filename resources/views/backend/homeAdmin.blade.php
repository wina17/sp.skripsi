@extends('layouts.backend')
@push('head_css')
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset ('backend/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset ('backend/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset ('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush
@section('content')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height: 850px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    @if (session('status'))
      <div class="alert alert-success" role="alert">{{ session('status') }}
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="{{ route('dataAdmin') }}" class="small-box bg-aqua">
            <div class="inner">
              <h3>ADMIN</h3>
              <p>Data Admin</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="{{ route('dataPenyakit') }}" class="small-box bg-green">
            <div class="inner">
              <h3>DISEASES</h3>
              <p>Data Penyakit</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text-o"></i>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="{{ route('dataGejala') }}" class="small-box bg-yellow">
            <div class="inner">
              <h3>SYMTOMPS</h3>
              <p>Data Gejala Penyakit</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text-o"></i>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="{{ route('dataAturan') }}" class="small-box bg-red">
            <div class="inner">
              <h3>RULES</h3>
              <p>Data Aturan</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
          </a>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- Hello Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3>Selamat bekerja, <i>{{ Auth::user()->name }}</i></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-paw margin-r-5"></i> Panduan Menu</strong><br>
              <p style="padding-top: 10px; text-align: justify; font-size: 16px;">Apabila Anda pengguna baru, Anda dapat memperhatikan penjelasan berikut ini. </p>
              <ul style="text-align: justify; font-size: 16px; padding-right: 35px;">
                <li>Menu data Admin, menu ini digunakan untuk mengelola data admin yang dapat mengakses backend system</li>
                <li>Menu data Penyakit, menu ini digunakan untuk mengelola seluruh data jenis penyakit pada hewan peliharaan dan bagaimana tindakan medis awal yang dapat dilakukan oleh pemilik hewan</li>
                <li>Menu data Gejala Penyakit, menu ini digunakan untuk mengelola seluruh gejala medis pada suatu penyakit.</li>
                <li>Menu data Aturan, menu ini digunakan untuk mengelola aturan relasi antara suatu penyakit dengan gejala penyakit lainnya, berserta tingkat keyakinan sebab-akibat yang gejala penyakit yang timbul akan berpengaruh pada suatu penyakit.</li>
              </ul>
              
              <hr>
              
              <strong><i class="fa fa-paw margin-r-5"></i> Catatan</strong>
              <p style="padding-top: 10px; text-align: justify; font-size: 16px;">
                Sistem pakar diagnosa penyakit pada anjing dibangun dengan maksud memberikan informasi tetang kesehatan kepada pemilik hewan peliharaan dan masyarakat umum. Maka dari itu sistem ini perlu bantuan Anda untuk memberikan data yang terupdate agar akurasi diagnosa oleh sistem dapat terjaga bahkan berkembang jauh lebih baik.  
              </p>

              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-4 connectedSortable">
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection
@push('body_css')
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ('backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="{{ asset ('backend/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset ('backend/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset ('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset ('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset ('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('backend/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset ('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset ('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endpush