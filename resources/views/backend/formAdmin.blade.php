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
            @if(Session::has('pesan'))
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" style="margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <h4><i class="fa fa-check"></i>{{ Session::get('pesan') }}</h4>  
                    </div>
                </div>
            @endif
            {{ Form::model($user, array('action' => $action, 'files' => true,)) }}
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">    
                {{ Form::label('name', 'NAMA LENGKAP') }}    
                {{ Form::text('name',null,['class'=>'form-control','placeholder' => 'Nama ','autofocus']) }}
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">
                {{ Form::label('email', 'EMAIL') }}
                {{ Form::text('email',null,array('class'=>'form-control','placeholder' => 'Email')) }}
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">
                {{ Form::label('password', 'PASSWORD') }}
                {{ Form::password('password',array('class' => 'form-control','placeholder' => 'Password')) }}
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">
                {{ Form::label('password_confirmation', 'KONFIRMASI PASSWORD') }}
                {{ Form::password('password_confirmation',array('class' => 'form-control','placeholder' => 'Konfirmasi Password')) }}    
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            </div>
            <div class="form-group" style="padding-bottom: 50px; padding-left: 10px; padding-top: 5px; padding-right: 10px;">
                {!! Form::submit($btn_submit, ['class' => 'btn btn-primary col-md-2']) !!}
                <a class="btn btn-info col-md-2 pull-right" href="{{ route('dataAdmin') }}" role="button">Kembali</a>
            </div>
            {!! Form::close() !!}
            <!-- form start -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
</div>
@endsection