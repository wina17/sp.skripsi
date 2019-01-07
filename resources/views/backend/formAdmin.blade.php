@extends('layouts.backend')
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
            {{ Form::model($user, array('action' => $action, 'files' => true,)) }}
            <div class="form-group" style="padding: 10px;">    
                {{ Form::label('name', 'Nama Lengkap') }}    
                {{ Form::text('name',null,['class'=>'form-control','placeholder' => 'Nama ','autofocus']) }}
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group" style="padding: 10px;">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email',null,array('class'=>'form-control','placeholder' => 'Email')) }}
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group" style="padding: 10px;">
                {{ Form::label('password', 'PASSWORD') }}
                {{ Form::password('password',array('class' => 'form-control','placeholder' => 'password')) }}
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group" style="padding: 10px;">
                {{ Form::label('password_confirmation', 'KONFIRMASI PASSWORD') }}
                {{ Form::password('password_confirmation',array('class' => 'form-control','placeholder' => 'konfirmasi password')) }}    
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            </div>
            {!! Form::submit($btn_submit, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-info" href="{{ route('dataAdmin') }}" role="button">Kembali</a>
            {!! Form::close() !!}
            <!-- form start -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
</div>
@endsection