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
    <!-- general form elements -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <div class="box box-primary">
            {{ Form::model($user, array('action' => $action, 'files' => true, 'method' => $method)) }}
            <div class="form-group">    
                {{ Form::label('name', 'Nama Lengkap') }}    
                {{ Form::text('name',null,['class'=>'form-control','placeholder' => 'Nama ','autofocus']) }}
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email',null,array('class'=>'form-control','placeholder' => 'Email')) }}
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
                {{ Form::label('password', 'PASSWORD') }}
                {{ Form::password('password',array('class' => 'form-control','placeholder' => 'password')) }}
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group">
                {{ Form::label('password_confirmation', 'KONFIRMASI PASSWORD') }}
                {{ Form::password('password_confirmation',array('class' => 'form-control','placeholder' => 'konfirmasi password')) }}    
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            </div>
            {!! Form::submit($btn_submit, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-info" href="{{ route('dataAdmin') }}" role="button">Kembali</a>
            {!! Form::close() !!}
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
</div>
@endsection
@push('body_css')
<!-- DataTables -->
<script src="{{ asset ('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endpush